<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;

class LicenseTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label(__('laravel-licensing-filament-manager::license.fields.id'))
                    ->searchable()
                    ->copyable()
                    ->sortable()
                    ->limit(8),

                Tables\Columns\TextColumn::make('scope.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('template.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                    ->badge()
                    ->color('primary')
                    ->sortable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('licensable_type')
                    ->label(__('laravel-licensing-filament-manager::license.fields.licensable_type'))
                    ->searchable()
                    ->sortable()
                    ->formatStateUsing(fn (string $state) => class_basename($state)),

                Tables\Columns\TextColumn::make('licensable_id')
                    ->label(__('laravel-licensing-filament-manager::license.fields.licensable_id'))
                    ->searchable()
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

                Tables\Columns\TextColumn::make('usages_count')
                    ->label(__('laravel-licensing-filament-manager::license.fields.usages'))
                    ->counts('usages')
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state, License $record) => $state >= $record->max_usages ? 'danger' : 'success'
                    ),

                Tables\Columns\TextColumn::make('max_usages')
                    ->label(__('laravel-licensing-filament-manager::license.fields.max_usages'))
                    ->sortable(),

                Tables\Columns\TextColumn::make('activated_at')
                    ->label(__('laravel-licensing-filament-manager::license.fields.activated_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->placeholder(__('laravel-licensing-filament-manager::common.not_activated')),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::license.fields.expires_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color(fn ($state) => $state && $state->isPast() ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                    ->options(LicenseStatus::class)
                    ->multiple(),

                Tables\Filters\SelectFilter::make('license_scope_id')
                    ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                    ->relationship('scope', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\SelectFilter::make('template_id')
                    ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                    ->relationship('template', 'name')
                    ->searchable()
                    ->preload(),

                Tables\Filters\TernaryFilter::make('expired')
                    ->label(__('laravel-licensing-filament-manager::license.filters.expired'))
                    ->queries(
                        true: fn (Builder $query) => $query->where('expires_at', '<', now()),
                        false: fn (Builder $query) => $query->where('expires_at', '>=', now()),
                    ),

                Tables\Filters\Filter::make('expiring_soon')
                    ->label(__('laravel-licensing-filament-manager::license.filters.expiring_soon'))
                    ->query(fn (Builder $query) => $query->whereBetween('expires_at', [now(), now()->addDays(30)])),

                Tables\Filters\Filter::make('over_limit')
                    ->label(__('laravel-licensing-filament-manager::license.filters.over_limit'))
                    ->query(fn (Builder $query) => $query->whereRaw('(SELECT COUNT(*) FROM license_usages WHERE license_id = licenses.id) >= max_usages')),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.view')),

                EditAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.edit')),

                Action::make('activate')
                    ->label(__('laravel-licensing-filament-manager::license.actions.activate'))
                    ->icon('heroicon-o-play')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (License $record) => $record->status === LicenseStatus::Pending)
                    ->action(function (License $record) {
                        $record->activate();
                        Notification::make()
                            ->title(__('laravel-licensing-filament-manager::license.notifications.activated'))
                            ->success()
                            ->send();
                    }),

                Action::make('suspend')
                    ->label(__('laravel-licensing-filament-manager::license.actions.suspend'))
                    ->icon('heroicon-o-pause')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->visible(fn (License $record) => $record->status === LicenseStatus::Active)
                    ->action(function (License $record) {
                        $record->suspend();
                        Notification::make()
                            ->title(__('laravel-licensing-filament-manager::license.notifications.suspended'))
                            ->warning()
                            ->send();
                    }),

                Action::make('show_key')
                    ->label(__('laravel-licensing-filament-manager::license.actions.show_key'))
                    ->icon('heroicon-o-key')
                    ->visible(fn (License $record) => $record->canRetrieveKey())
                    ->action(function (License $record) {
                        $key = $record->retrieveKey();

                        Notification::make()
                            ->title(__('laravel-licensing-filament-manager::license.notifications.key_retrieved'))
                            ->body($key
                                ? __('laravel-licensing-filament-manager::license.notifications.key_value', ['key' => $key])
                                : __('laravel-licensing-filament-manager::license.notifications.key_unavailable'))
                            ->success()
                            ->persistent()
                            ->send();
                    }),

                Action::make('regenerate_key')
                    ->label(__('laravel-licensing-filament-manager::license.actions.regenerate_key'))
                    ->icon('heroicon-o-arrow-path')
                    ->color('gray')
                    ->requiresConfirmation()
                    ->visible(fn (License $record) => $record->canRegenerateKey())
                    ->action(function (License $record) {
                        $newKey = $record->regenerateKey();

                        Notification::make()
                            ->title(__('laravel-licensing-filament-manager::license.notifications.key_regenerated'))
                            ->body(__('laravel-licensing-filament-manager::license.notifications.key_value', ['key' => $newKey]))
                            ->success()
                            ->persistent()
                            ->send();
                    }),

                DeleteAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.delete')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('laravel-licensing-filament-manager::common.actions.delete_selected')),
                ]),
            ])
            ->defaultSort('created_at', 'desc')
            ->poll('30s');
    }
}
