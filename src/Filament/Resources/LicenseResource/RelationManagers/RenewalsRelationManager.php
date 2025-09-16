<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\RelationManagers;

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

class RenewalsRelationManager extends RelationManager
{
    protected static string $relationship = 'renewals';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\DateTimePicker::make('period_start')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.period_start'))
                    ->displayFormat('d/m/Y H:i')
                    ->required(),

                Forms\Components\DateTimePicker::make('period_end')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.period_end'))
                    ->displayFormat('d/m/Y H:i')
                    ->required(),

                Forms\Components\TextInput::make('amount_cents')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.amount_cents'))
                    ->numeric()
                    ->minValue(0),

                Forms\Components\TextInput::make('currency')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.currency'))
                    ->maxLength(3)
                    ->default('USD'),

                Forms\Components\Textarea::make('notes')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.notes'))
                    ->maxLength(65535)
                    ->rows(3),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('period_start')
            ->columns([
                Tables\Columns\TextColumn::make('period_start')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.period_start'))
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('period_end')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.period_end'))
                    ->dateTime('d/m/Y')
                    ->sortable(),

                Tables\Columns\TextColumn::make('duration')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.duration'))
                    ->state(function ($record) {
                        if (! $record->period_start || ! $record->period_end) {
                            return '-';
                        }

                        return $record->period_start->diffInDays($record->period_end).' '.__('laravel-licensing-filament-manager::license-renewal.days');
                    }),

                Tables\Columns\TextColumn::make('amount_cents')
                    ->label(__('laravel-licensing-filament-manager::license-renewal.fields.amount'))
                    ->money(fn ($record) => $record->currency ?? 'USD', divideBy: 100)
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
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
            ->defaultSort('period_start', 'desc');
    }

    public static function getTitle($ownerRecord, $pageClass): string
    {
        return __('laravel-licensing-filament-manager::license.relations.renewals');
    }
}
