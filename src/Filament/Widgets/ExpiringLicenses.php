<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;

class ExpiringLicenses extends BaseWidget
{
    public function getHeading(): string
    {
        return __('laravel-licensing-filament-manager::licensing.widgets.expiring_licenses.heading');
    }

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $licenseModel = config('licensing.models.license');

        return $table
            ->query(
                $licenseModel::query()
                    ->with('scope')
                    ->where('status', LicenseStatus::Active)
                    ->whereNotNull('expires_at')
                    ->whereBetween('expires_at', [now(), now()->addDays(30)])
                    ->orderBy('expires_at')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('uid')
                    ->label(__('laravel-licensing-filament-manager::license.fields.id'))
                    ->copyable()
                    ->limit(12)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('scope.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                    ->badge()
                    ->color('info')
                    ->sortable(),
                Tables\Columns\TextColumn::make('expires_at')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.expires_at'))
                    ->dateTime()
                    ->sortable()
                    ->color(fn (License $record) =>
                        optional($record->expires_at)->diffInDays(now()) <= 7 ? 'danger' : 'warning'),
                Tables\Columns\TextColumn::make('days_remaining')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.days_remaining'))
                    ->getStateUsing(fn (License $record) => max(0, $record->daysUntilExpiration() ?? 0))
                    ->badge()
                    ->color(fn ($state) => $state <= 7 ? 'danger' : 'warning'),
            ])
            ->paginated(false)
            ->emptyStateHeading(__('laravel-licensing-filament-manager::licensing.widgets.expiring_licenses.empty_heading'))
            ->emptyStateDescription(__('laravel-licensing-filament-manager::licensing.widgets.expiring_licenses.empty_description'));
    }
}
