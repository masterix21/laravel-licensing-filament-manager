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
                Tables\Columns\TextColumn::make('template.scope.name')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.scope'))
                    ->badge()
                    ->color('info')
                    ->placeholder(__('laravel-licensing-filament-manager::license-template.fields.global'))
                    ->toggleable(),

                Tables\Columns\TextColumn::make('template.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                    ->searchable()
                    ->sortable()
                    ->description(fn (License $record) => $record->licensable ? class_basename($record->licensable_type) : null),

                Tables\Columns\TextColumn::make('status')
                    ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                    ->badge()
                    ->formatStateUsing(fn (License $record) => __("laravel-licensing-filament-manager::license.statuses.{$record->status->value}"))
                    ->colors([
                        'warning' => LicenseStatus::Pending,
                        'success' => LicenseStatus::Active,
                        'info' => LicenseStatus::Grace,
                        'danger' => [LicenseStatus::Expired, LicenseStatus::Suspended, LicenseStatus::Cancelled],
                    ]),

                Tables\Columns\TextColumn::make('usages_count')
                    ->label(__('laravel-licensing-filament-manager::license.fields.usages'))
                    ->counts('usages')
                    ->formatStateUsing(fn (int $state, License $record) => "{$state}/{$record->max_usages}")
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state, License $record) => $state >= $record->max_usages ? 'danger' : 'success'),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::license.fields.expires_at'))
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->color(fn ($state) => $state?->isPast() ? 'danger' : null)
                    ->placeholder(__('laravel-licensing-filament-manager::license-scope.perpetual')),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                    ->options(collect(LicenseStatus::cases())->mapWithKeys(
                        fn (LicenseStatus $status) => [$status->value => __("laravel-licensing-filament-manager::license.statuses.{$status->value}")]
                    ))
                    ->multiple(),

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
                    ->iconButton(),

                EditAction::make()
                    ->iconButton(),

                Action::make('activate')
                    ->tooltip(__('laravel-licensing-filament-manager::license.actions.activate'))
                    ->icon('heroicon-o-play')
                    ->color('success')
                    ->iconButton()
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
                    ->tooltip(__('laravel-licensing-filament-manager::license.actions.suspend'))
                    ->icon('heroicon-o-pause')
                    ->color('warning')
                    ->iconButton()
                    ->requiresConfirmation()
                    ->visible(fn (License $record) => $record->status === LicenseStatus::Active)
                    ->action(function (License $record) {
                        $record->suspend();

                        Notification::make()
                            ->title(__('laravel-licensing-filament-manager::license.notifications.suspended'))
                            ->warning()
                            ->send();
                    }),

                DeleteAction::make()
                    ->iconButton(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('laravel-licensing-filament-manager::common.actions.delete_selected')),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function configureForRelationManager(Table $table): Table
    {
        $configuredTable = self::configure($table);

        $columns = collect($configuredTable->getColumns())
            ->filter(fn ($column) => ! in_array($column->getName(), ['template.scope.name', 'template.name']))
            ->toArray();

        $filters = collect($configuredTable->getFilters())
            ->filter(fn ($filter) => $filter->getName() !== 'template_id')
            ->toArray();

        return $configuredTable
            ->columns($columns)
            ->filters($filters);
    }
}
