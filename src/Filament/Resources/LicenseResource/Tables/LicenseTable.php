<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Notifications\Notification;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;
use LucaLongo\Licensing\Models\LicenseScope;

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
                    ->limit(8)
                    ->description(fn (License $record) => $record->template?->name),

                Tables\Columns\TextColumn::make('scope.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                    ->searchable()
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('licensable')
                    ->label(__('laravel-licensing-filament-manager::license.fields.licensable'))
                    ->formatStateUsing(function (License $record) {
                        if (! $record->licensable_type || ! $record->licensable_id) {
                            return '—';
                        }

                        $config = config('licensing-filament-manager.licensed_entities', []);
                        $modelConfig = $config[$record->licensable_type] ?? null;

                        if ($modelConfig && class_exists($record->licensable_type)) {
                            try {
                                $model = $record->licensable_type::find($record->licensable_id);
                                if ($model) {
                                    $titleField = $modelConfig['title'] ?? 'name';
                                    $displayValue = data_get($model, $titleField, "#{$record->licensable_id}");

                                    return sprintf(
                                        '%s: %s',
                                        class_basename($record->licensable_type),
                                        $displayValue
                                    );
                                }
                            } catch (\Exception $e) {
                                // If we can't load the model, fall back to showing IDs
                            }
                        }

                        // Fallback: show type and ID
                        return sprintf(
                            '%s: #%s',
                            class_basename($record->licensable_type),
                            $record->licensable_id
                        );
                    })
                    ->sortable(query: function ($query, string $direction) {
                        return $query->orderBy('licensable_type', $direction)
                            ->orderBy('licensable_id', $direction);
                    }),

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
                    ->formatStateUsing(fn (int $state, License $record) => "{$state}/{$record->max_usages}")
                    ->sortable()
                    ->badge()
                    ->color(fn (int $state, License $record) => $state >= $record->max_usages ? 'danger' : 'success'),

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
            ->defaultSort('created_at', 'desc');
    }

    public static function configureForRelationManager(Table $table, $livewire): Table
    {
        $configuredTable = self::configure($table);

        // Hide the scope column since we're already in a scope context
        $columns = collect($configuredTable->getColumns())
            ->filter(fn ($column) => $column->getName() !== 'scope.name')
            ->toArray();

        // Remove the license_scope_id filter since we're already filtering by scope
        $filters = collect($configuredTable->getFilters())
            ->filter(fn ($filter) => $filter->getName() !== 'license_scope_id')
            ->toArray();

        // Add custom header actions for relation manager
        return $configuredTable
            ->columns($columns)
            ->filters($filters)
            ->headerActions([
                CreateAction::make()
                    ->label(__('laravel-licensing-filament-manager::license.actions.create'))
                    ->using(function (array $data) use ($livewire) {
                        if (! $livewire instanceof RelationManager) {
                            throw new \RuntimeException('This method can only be used with RelationManager instances');
                        }

                        /** @var LicenseScope $scope */
                        $scope = $livewire->getOwnerRecord();

                        $templateId = $data['template_id'] ?? null;
                        $template = $templateId ? $scope->templates()->find($templateId) : null;

                        // Prepare license data
                        $licenseData = [
                            'license_scope_id' => $scope->id,
                            'licensable_type' => $data['licensable_type'] ?? null,
                            'licensable_id' => $data['licensable_id'] ?? null,
                            'max_usages' => $data['max_usages'] ?? ($template?->max_usages ?? 1),
                            'expires_at' => $data['expires_at'] ?? null,
                            'meta' => $data['meta'] ?? [],
                        ];

                        // Apply template defaults if provided
                        if ($template) {
                            $licenseData['template_id'] = $template->id;
                            if (! isset($data['expires_at']) && $template->validity_days) {
                                $licenseData['expires_at'] = now()->addDays($template->validity_days);
                            }
                            if (! isset($data['max_usages'])) {
                                $licenseData['max_usages'] = $template->max_usages ?? 1;
                            }
                            // Merge template meta with provided meta
                            $templateMeta = $template->meta ? $template->meta->toArray() : [];
                            $providedMeta = $data['meta'] ?? [];
                            $licenseData['meta'] = array_merge($templateMeta, $providedMeta);
                        }

                        // Create license with key using the built-in method
                        /** @var License $license */
                        $license = License::createWithKey($licenseData);

                        // Get the temporarily stored key
                        $generatedKey = $license->temporaryLicenseKey ?? null;

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
            ]);
    }
}
