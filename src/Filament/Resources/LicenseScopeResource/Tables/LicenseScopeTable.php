<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use LucaLongo\Licensing\Models\LicenseScope;

class LicenseScopeTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('slug')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.slug'))
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('identifier')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.identifier'))
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();

                        return strlen($state) > 30 ? $state : null;
                    }),

                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.is_active'))
                    ->boolean()
                    ->sortable(),

                Tables\Columns\TextColumn::make('licenses_count')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.licenses_count'))
                    ->counts('licenses')
                    ->sortable()
                    ->badge()
                    ->color('info'),

                Tables\Columns\TextColumn::make('active_licenses_count')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.active_licenses_count'))
                    ->state(fn (LicenseScope $record) => $record->licenses()->where('status', 'active')->count())
                    ->sortable()
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('default_max_usages')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_max_usages'))
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('default_duration_days')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_duration_days'))
                    ->sortable()
                    ->placeholder(__('laravel-licensing-filament-manager::license-scope.perpetual'))
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('key_rotation_days')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.key_rotation_days'))
                    ->sortable()
                    ->formatStateUsing(fn ($state) => $state > 0
                        ? __('laravel-licensing-filament-manager::license-scope.rotation_days', ['days' => $state])
                        : __('laravel-licensing-filament-manager::license-scope.disabled'))
                    ->color(fn ($state) => $state > 0 ? 'success' : 'gray')
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('next_key_rotation_at')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.next_key_rotation_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color(fn ($state) => $state && $state->isPast() ? 'danger' : 'success')
                    ->placeholder(__('laravel-licensing-filament-manager::common.not_scheduled'))
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__('laravel-licensing-filament-manager::common.updated_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.is_active'))
                    ->placeholder(__('laravel-licensing-filament-manager::common.all'))
                    ->trueLabel(__('laravel-licensing-filament-manager::common.active'))
                    ->falseLabel(__('laravel-licensing-filament-manager::common.inactive')),

                Tables\Filters\Filter::make('needs_rotation')
                    ->label(__('laravel-licensing-filament-manager::license-scope.filters.needs_rotation'))
                    ->query(fn (Builder $query) => $query->needingRotation()),

                Tables\Filters\Filter::make('has_licenses')
                    ->label(__('laravel-licensing-filament-manager::license-scope.filters.has_licenses'))
                    ->query(fn (Builder $query) => $query->has('licenses')),
            ])
            ->recordActions([
                Action::make('rotate_keys')
                    ->label(__('laravel-licensing-filament-manager::license-scope.actions.rotate_keys'))
                    ->icon('heroicon-o-arrow-path')
                    ->color('warning')
                    ->requiresConfirmation()
                    ->modalHeading(__('laravel-licensing-filament-manager::license-scope.actions.rotate_keys_modal_heading'))
                    ->modalDescription(__('laravel-licensing-filament-manager::license-scope.actions.rotate_keys_modal_description'))
                    ->visible(fn (LicenseScope $record) => $record->key_rotation_days > 0)
                    ->action(function (LicenseScope $record) {
                        $record->rotateKeys(__('laravel-licensing-filament-manager::license-scope.actions.manual_rotation'));
                    }),

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
            ->defaultSort('created_at', 'desc')
            ->poll('60s');
    }
}
