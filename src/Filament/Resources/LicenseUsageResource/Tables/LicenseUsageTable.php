<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Table;

class LicenseUsageTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('license.key')
                    ->label('License Key')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('device_id')
                    ->searchable(),
                Tables\Columns\TextColumn::make('device_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('activated_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deactivated_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
                    ->getStateUsing(fn ($record) => is_null($record->deactivated_at))
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\Filter::make('active')
                    ->label('Active')
                    ->query(fn ($query) => $query->whereNull('deactivated_at')),
                Tables\Filters\Filter::make('deactivated')
                    ->label('Deactivated')
                    ->query(fn ($query) => $query->whereNotNull('deactivated_at')),
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                Action::make('deactivate')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->visible(fn ($record) => is_null($record->deactivated_at))
                    ->requiresConfirmation()
                    ->action(fn ($record) => $record->update(['deactivated_at' => now()])),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('activated_at', 'desc');
    }
}