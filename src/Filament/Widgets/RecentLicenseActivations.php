<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentLicenseActivations extends BaseWidget
{
    public function getHeading(): string
    {
        return __('laravel-licensing-filament-manager::licensing.widgets.recent_usages.heading');
    }

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $licenseUsageModel = config('licensing.models.license_usage');

        return $table
            ->query(
                $licenseUsageModel::query()
                    ->with('license')
                    ->latest('created_at')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('license.key')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.license_key'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('feature')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.feature'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('quantity')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.quantity'))
                    ->numeric(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.used_at'))
                    ->dateTime()
                    ->sortable(),
            ])
            ->paginated(false);
    }
}
