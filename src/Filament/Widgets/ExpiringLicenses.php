<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ExpiringLicenses extends BaseWidget
{
    public function getHeading(): string
    {
        return __('laravel-licensing-filament-manager::licensing.widgets.expiring_licenses.heading');
    }

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $licenseModel = config('licensing.models.license');

        return $table
            ->query(
                $licenseModel::query()
                    ->with('scope')
                    ->whereNotNull('expires_at')
                    ->where('expires_at', '>', now())
                    ->where('expires_at', '<=', now()->addDays(30))
                    ->orderBy('expires_at')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('key')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.license_key'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scope.name')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.scope'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.expires_at'))
                    ->dateTime()
                    ->sortable()
                    ->color(fn ($record) => $record->expires_at->diffInDays(now()) <= 7 ? 'danger' : 'warning'
                    ),
                Tables\Columns\TextColumn::make('days_remaining')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.days_remaining'))
                    ->getStateUsing(fn ($record) => $record->expires_at->diffInDays(now())
                    )
                    ->badge()
                    ->color(fn ($state) => $state <= 7 ? 'danger' : 'warning'
                    ),
            ])
            ->paginated(false)
            ->emptyStateHeading(__('laravel-licensing-filament-manager::licensing.widgets.expiring_licenses.empty_heading'))
            ->emptyStateDescription(__('laravel-licensing-filament-manager::licensing.widgets.expiring_licenses.empty_description'));
    }
}
