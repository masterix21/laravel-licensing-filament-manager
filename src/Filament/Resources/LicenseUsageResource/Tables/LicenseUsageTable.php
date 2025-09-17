<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Table;
use LucaLongo\Licensing\Enums\UsageStatus;
use LucaLongo\Licensing\Models\LicenseUsage;

class LicenseUsageTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('license.uid')
                    ->label(__('laravel-licensing-filament-manager::license.fields.id'))
                    ->copyable()
                    ->limit(10)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('license.scope.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                    ->badge()
                    ->color('info')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('usage_fingerprint')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.usage_fingerprint'))
                    ->copyable()
                    ->limit(24)
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_type')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.client_type'))
                    ->badge()
                    ->color('gray')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.status'))
                    ->badge()
                    ->colors([
                        'success' => UsageStatus::Active,
                        'danger' => UsageStatus::Revoked,
                    ])
                    ->sortable(),
                Tables\Columns\TextColumn::make('registered_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.registered_at'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_seen_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.last_seen_at'))
                    ->dateTime()
                    ->sortable()
                    ->color(fn ($state) => $state && $state->diffInDays() > 7 ? 'warning' : 'success'),
                Tables\Columns\TextColumn::make('revoked_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.revoked_at'))
                    ->dateTime()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.status'))
                    ->options(UsageStatus::class),
                Tables\Filters\Filter::make('stale')
                    ->label(__('laravel-licensing-filament-manager::license-usage.filters.inactive'))
                    ->query(fn ($query) => $query->where('last_seen_at', '<', now()->subDays(7))),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
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
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('registered_at', 'desc');
    }
}
