<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\RelationManagers;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use LucaLongo\Licensing\Enums\UsageStatus;
use LucaLongo\Licensing\Models\LicenseUsage;

class UsagesRelationManager extends RelationManager
{
    protected static string $relationship = 'usages';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('usage_fingerprint')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.usage_fingerprint'))
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.status'))
                    ->options(UsageStatus::class)
                    ->required(),

                Forms\Components\TextInput::make('client_type')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.client_type'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('name')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.name'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('ip')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.ip'))
                    ->maxLength(45),

                Forms\Components\TextInput::make('user_agent')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.user_agent'))
                    ->maxLength(500),

                Forms\Components\DateTimePicker::make('registered_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.registered_at'))
                    ->displayFormat('d/m/Y H:i')
                    ->required(),

                Forms\Components\DateTimePicker::make('last_seen_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.last_seen_at'))
                    ->displayFormat('d/m/Y H:i'),

                Forms\Components\DateTimePicker::make('revoked_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.revoked_at'))
                    ->displayFormat('d/m/Y H:i')
                    ->visible(fn (Forms\Get $get) => $get('status') === UsageStatus::Revoked->value),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('usage_fingerprint')
            ->columns([
                Tables\Columns\TextColumn::make('usage_fingerprint')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.usage_fingerprint'))
                    ->searchable()
                    ->copyable()
                    ->limit(20)
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.status'))
                    ->badge()
                    ->colors([
                        'success' => UsageStatus::Active,
                        'danger' => UsageStatus::Revoked,
                    ]),

                Tables\Columns\TextColumn::make('client_type')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.client_type'))
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.name'))
                    ->searchable()
                    ->limit(30),

                Tables\Columns\TextColumn::make('ip')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.ip'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('registered_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.registered_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('last_seen_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.last_seen_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color(fn ($state) => $state && $state->diffInDays() > 7 ? 'warning' : 'success'),

                Tables\Columns\TextColumn::make('revoked_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.revoked_at'))
                    ->dateTime('d/m/Y H:i')
                    ->placeholder(__('laravel-licensing-filament-manager::common.not_revoked'))
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.status'))
                    ->options(UsageStatus::class),

                Tables\Filters\Filter::make('inactive')
                    ->label(__('laravel-licensing-filament-manager::license-usage.filters.inactive'))
                    ->query(fn ($query) => $query->where('last_seen_at', '<', now()->subDays(7))),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.view')),

                EditAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.edit')),

                Action::make('revoke')
                    ->label(__('laravel-licensing-filament-manager::license-usage.actions.revoke'))
                    ->icon('heroicon-o-x-mark')
                    ->color('danger')
                    ->visible(fn (LicenseUsage $record) => $record->status === UsageStatus::Active)
                    ->requiresConfirmation()
                    ->action(function (LicenseUsage $record) {
                        $record->revoke();

                        Notification::make()
                            ->title(__('laravel-licensing-filament-manager::license-usage.notifications.revoked'))
                            ->warning()
                            ->send();
                    }),

                Action::make('heartbeat')
                    ->label(__('laravel-licensing-filament-manager::license-usage.actions.heartbeat'))
                    ->icon('heroicon-o-heart')
                    ->color('success')
                    ->visible(fn (LicenseUsage $record) => $record->status === UsageStatus::Active)
                    ->action(function (LicenseUsage $record) {
                        $record->update(['last_seen_at' => now()]);
                    }),

                DeleteAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.delete')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    Action::make('bulk_revoke')
                        ->label(__('laravel-licensing-filament-manager::license-usage.actions.revoke_selected'))
                        ->icon('heroicon-o-x-mark')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                if ($record->status === UsageStatus::Active) {
                                    $record->revoke();
                                }
                            }
                        }),
                ]),
            ])
            ->defaultSort('registered_at', 'desc');
    }

    public static function getTitle($ownerRecord, $pageClass): string
    {
        return __('laravel-licensing-filament-manager::license.relations.usages');
    }
}
