<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Crypt;
use LucaLongo\Licensing\Contracts\LicenseKeyGeneratorContract;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;
use LucaLongo\Licensing\Models\LicenseScope;
use LucaLongo\Licensing\Services\TemplateService;

class LicensesRelationManager extends RelationManager
{
    protected static string $relationship = 'licenses';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('status')
                    ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                    ->options(LicenseStatus::class)
                    ->required(),

                Forms\Components\Select::make('template_id')
                    ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                    ->options(function () {
                        /** @var LicenseScope $scope */
                        $scope = $this->getOwnerRecord();

                        return $scope->templates()
                            ->active()
                            ->orderedByTier()
                            ->pluck('name', 'id')
                            ->toArray();
                    })
                    ->required()
                    ->searchable()
                    ->preload()
                    ->helperText(__('laravel-licensing-filament-manager::license.help.template')),

                Forms\Components\MorphToSelect::make('licensable')
                    ->label(__('laravel-licensing-filament-manager::license.fields.licensable'))
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('max_usages')
                    ->label(__('laravel-licensing-filament-manager::license.fields.max_usages'))
                    ->numeric()
                    ->minValue(1)
                    ->hiddenOn('create'),

                Forms\Components\DateTimePicker::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::license.fields.expires_at'))
                    ->displayFormat('d/m/Y H:i')
                    ->nullable()
                    ->helperText(__('laravel-licensing-filament-manager::license.help.expires_at')),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('laravel-licensing-filament-manager::common.id'))
                    ->limit(8)
                    ->copyable(),

                Tables\Columns\TextColumn::make('licensable_type')
                    ->label(__('laravel-licensing-filament-manager::license.fields.licensable_type'))
                    ->formatStateUsing(fn (string $state) => class_basename($state)),

                Tables\Columns\TextColumn::make('licensable_id')
                    ->label(__('laravel-licensing-filament-manager::license.fields.licensable_id'))
                    ->limit(10),

                Tables\Columns\TextColumn::make('status')
                    ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                    ->badge()
                    ->colors([
                        'warning' => LicenseStatus::Pending,
                        'success' => LicenseStatus::Active,
                        'info' => LicenseStatus::Grace,
                        'danger' => [LicenseStatus::Expired, LicenseStatus::Suspended, LicenseStatus::Cancelled],
                    ]),

                Tables\Columns\TextColumn::make('template.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                    ->badge()
                    ->color('primary')
                    ->toggleable(),

                Tables\Columns\TextColumn::make('usages_count')
                    ->label(__('laravel-licensing-filament-manager::license.fields.usages'))
                    ->counts('usages')
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('max_usages')
                    ->label(__('laravel-licensing-filament-manager::license.fields.max_usages')),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::license.fields.expires_at'))
                    ->dateTime('d/m/Y H:i')
                    ->color(fn ($state) => $state && $state->isPast() ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                    ->options(LicenseStatus::class)
                    ->multiple(),

                Tables\Filters\SelectFilter::make('template_id')
                    ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                    ->relationship('template', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label(__('laravel-licensing-filament-manager::license.actions.create'))
                    ->using(function (array $data, RelationManager $livewire) {
                        /** @var LicenseScope $scope */
                        $scope = $livewire->getOwnerRecord();

                        $templateId = $data['template_id'];
                        unset($data['template_id']);

                        /** @var TemplateService $templateService */
                        $templateService = app(TemplateService::class);

                        /** @var License $license */
                        $license = $templateService->createLicenseForScope($scope, $templateId, $data);

                        $generatedKey = null;

                        try {
                            if ($license->canRegenerateKey()) {
                                $generatedKey = $license->regenerateKey();
                            } else {
                                /** @var LicenseKeyGeneratorContract $generator */
                                $generator = app(LicenseKeyGeneratorContract::class);
                                $generated = $generator->generate($license);

                                $meta = $license->meta?->toArray() ?? [];

                                if ($license->canRetrieveKey()) {
                                    $meta['encrypted_key'] = Crypt::encryptString($generated);
                                    $generatedKey = $generated;
                                }

                                $license->update([
                                    'key_hash' => License::hashKey($generated),
                                    'meta' => $meta,
                                ]);
                            }
                        } catch (\Throwable $exception) {
                            report($exception);
                        }

                        if ($generatedKey) {
                            Notification::make()
                                ->title(__('laravel-licensing-filament-manager::license.notifications.key_generated'))
                                ->body(__('laravel-licensing-filament-manager::license.notifications.key_value', ['key' => $generatedKey]))
                                ->success()
                                ->persistent()
                                ->send();
                        }

                        return $license->refresh();
                    }),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.view')),
                EditAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.edit')),
                DeleteAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.delete')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('laravel-licensing-filament-manager::common.actions.delete_selected')),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getTitle($ownerRecord, $pageClass): string
    {
        return __('laravel-licensing-filament-manager::license-scope.relations.licenses');
    }
}
