<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\RelationManagers;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use LucaLongo\Licensing\Enums\TrialStatus;

class TrialsRelationManager extends RelationManager
{
    protected static string $relationship = 'trials';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                // Trial forms would be complex - keeping minimal for now
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

                Tables\Columns\TextColumn::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-trial.fields.status'))
                    ->badge()
                    ->colors([
                        'success' => TrialStatus::Active,
                        'info' => TrialStatus::Converted,
                        'danger' => TrialStatus::Expired,
                        'warning' => TrialStatus::Cancelled,
                    ]),

                Tables\Columns\TextColumn::make('started_at')
                    ->label(__('laravel-licensing-filament-manager::license-trial.fields.started_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),

                Tables\Columns\TextColumn::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::license-trial.fields.ends_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.view')),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make()
                        ->label(__('laravel-licensing-filament-manager::common.actions.delete_selected')),
                ]),
            ])
            ->defaultSort('started_at', 'desc');
    }

    public static function getTitle($ownerRecord, $pageClass): string
    {
        return __('laravel-licensing-filament-manager::license.relations.trials');
    }
}
