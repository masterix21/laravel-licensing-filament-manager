<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use LucaLongo\Licensing\Enums\LicenseStatus;

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

                Forms\Components\MorphToSelect::make('licensable')
                    ->label(__('laravel-licensing-filament-manager::license.fields.licensable'))
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('max_usages')
                    ->label(__('laravel-licensing-filament-manager::license.fields.max_usages'))
                    ->numeric()
                    ->minValue(1)
                    ->required(),

                Forms\Components\DateTimePicker::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::license.fields.expires_at'))
                    ->displayFormat('d/m/Y H:i')
                    ->required(),
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

                Tables\Columns\BadgeColumn::make('status')
                    ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                    ->colors([
                        'warning' => LicenseStatus::Pending,
                        'success' => LicenseStatus::Active,
                        'info' => LicenseStatus::Grace,
                        'danger' => [LicenseStatus::Expired, LicenseStatus::Suspended, LicenseStatus::Cancelled],
                    ]),

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
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->label(__('laravel-licensing-filament-manager::license.actions.create'))
                    ->mutateFormDataUsing(function (array $data): array {
                        // Use defaults from the license scope
                        $licenseScope = $this->getOwnerRecord();
                        $data['max_usages'] = $data['max_usages'] ?? $licenseScope->default_max_usages;

                        if (! isset($data['expires_at']) && $licenseScope->default_duration_days) {
                            $data['expires_at'] = now()->addDays($licenseScope->default_duration_days);
                        }

                        return $data;
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
