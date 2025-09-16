<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use LucaLongo\Licensing\Models\LicensingKey;

class SigningKeysRelationManager extends RelationManager
{
    protected static string $relationship = 'signingKeys';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('kid')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.kid'))
                    ->disabled()
                    ->dehydrated(false),

                Forms\Components\Select::make('status')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.status'))
                    ->options([
                        'active' => __('laravel-licensing-filament-manager::licensing-key.status.active'),
                        'revoked' => __('laravel-licensing-filament-manager::licensing-key.status.revoked'),
                        'compromised' => __('laravel-licensing-filament-manager::licensing-key.status.compromised'),
                    ])
                    ->required(),

                Forms\Components\DateTimePicker::make('valid_from')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.valid_from'))
                    ->displayFormat('d/m/Y H:i'),

                Forms\Components\DateTimePicker::make('valid_until')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.valid_until'))
                    ->displayFormat('d/m/Y H:i'),

                Forms\Components\Textarea::make('revocation_reason')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.revocation_reason'))
                    ->visible(fn (Get $get) => in_array($get('status'), ['revoked', 'compromised']))
                    ->required(fn (Get $get) => in_array($get('status'), ['revoked', 'compromised'])),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('kid')
            ->columns([
                Tables\Columns\TextColumn::make('kid')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.kid'))
                    ->searchable()
                    ->copyable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.status'))
                    ->colors([
                        'success' => 'active',
                        'danger' => ['revoked', 'compromised'],
                    ])
                    ->formatStateUsing(fn (string $state) => __("laravel-licensing-filament-manager::licensing-key.status.{$state}")),

                Tables\Columns\TextColumn::make('algorithm')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.algorithm'))
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('valid_from')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.valid_from'))
                    ->dateTime('d/m/Y H:i')
                    ->placeholder(__('laravel-licensing-filament-manager::common.always')),

                Tables\Columns\TextColumn::make('valid_until')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.valid_until'))
                    ->dateTime('d/m/Y H:i')
                    ->placeholder(__('laravel-licensing-filament-manager::common.never'))
                    ->color(fn ($state) => $state && $state->isPast() ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('revoked_at')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.revoked_at'))
                    ->dateTime('d/m/Y H:i')
                    ->placeholder(__('laravel-licensing-filament-manager::common.not_revoked'))
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y H:i')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.fields.status'))
                    ->options([
                        'active' => __('laravel-licensing-filament-manager::licensing-key.status.active'),
                        'revoked' => __('laravel-licensing-filament-manager::licensing-key.status.revoked'),
                        'compromised' => __('laravel-licensing-filament-manager::licensing-key.status.compromised'),
                    ]),

                Tables\Filters\Filter::make('expired')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.filters.expired'))
                    ->query(fn ($query) => $query->where('valid_until', '<', now())),
            ])
            ->headerActions([
                Action::make('generate_new')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.actions.generate_new'))
                    ->icon('heroicon-o-plus')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading(__('laravel-licensing-filament-manager::licensing-key.actions.generate_new_modal_heading'))
                    ->modalDescription(__('laravel-licensing-filament-manager::licensing-key.actions.generate_new_modal_description'))
                    ->action(function () {
                        $licenseScope = $this->getOwnerRecord();
                        $newKey = LicensingKey::generateSigningKey(
                            kid: $licenseScope->slug.'-'.now()->format('Y-m-d-His'),
                            scope: $licenseScope
                        );
                        $newKey->save();
                    }),
            ])
            ->recordActions([
                Action::make('revoke')
                    ->label(__('laravel-licensing-filament-manager::licensing-key.actions.revoke'))
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn (LicensingKey $record) => $record->status === 'active')
                    ->requiresConfirmation()
                    ->modalHeading(__('laravel-licensing-filament-manager::licensing-key.actions.revoke_modal_heading'))
                    ->modalDescription(__('laravel-licensing-filament-manager::licensing-key.actions.revoke_modal_description'))
                    ->form([
                        Forms\Components\Textarea::make('reason')
                            ->label(__('laravel-licensing-filament-manager::licensing-key.fields.revocation_reason'))
                            ->required(),
                    ])
                    ->action(function (LicensingKey $record, array $data) {
                        $record->update([
                            'status' => 'revoked',
                            'revoked_at' => now(),
                            'revocation_reason' => $data['reason'],
                        ]);
                    }),

                ViewAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.view')),

                EditAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.edit')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    Action::make('bulk_revoke')
                        ->label(__('laravel-licensing-filament-manager::licensing-key.actions.revoke_selected'))
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->form([
                            Forms\Components\Textarea::make('reason')
                                ->label(__('laravel-licensing-filament-manager::licensing-key.fields.revocation_reason'))
                                ->required(),
                        ])
                        ->action(function (array $data, $records) {
                            foreach ($records as $record) {
                                if ($record->status === 'active') {
                                    $record->update([
                                        'status' => 'revoked',
                                        'revoked_at' => now(),
                                        'revocation_reason' => $data['reason'],
                                    ]);
                                }
                            }
                        }),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getTitle($ownerRecord, $pageClass): string
    {
        return __('laravel-licensing-filament-manager::license-scope.relations.signing_keys');
    }
}
