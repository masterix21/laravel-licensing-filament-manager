<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class LicenseTemplateTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('scope.name')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.scope'))
                    ->badge()
                    ->color('info')
                    ->searchable()
                    ->sortable()
                    ->placeholder(__('laravel-licensing-filament-manager::license-template.fields.global')),

                Tables\Columns\TextColumn::make('name')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->description(fn ($record) => $record->parentTemplate?->name)
                    ->icon(fn ($record) => $record->parent_template_id ? 'heroicon-m-link' : null)
                    ->iconPosition('before'),

                Tables\Columns\TextColumn::make('slug')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.slug'))
                    ->copyable()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('tier_level')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.tier_level'))
                    ->sortable()
                    ->badge()
                    ->color('primary'),

                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.is_active'))
                    ->boolean(),

                Tables\Columns\TextColumn::make('licenses_count')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.licenses_count'))
                    ->counts('licenses')
                    ->sortable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('laravel-licensing-filament-manager::license-template.filters.is_active')),

                Tables\Filters\SelectFilter::make('license_scope_id')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.scope'))
                    ->relationship('scope', 'name')
                    ->searchable()
                    ->preload(),
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
            ->defaultSort('tier_level');
    }
}
