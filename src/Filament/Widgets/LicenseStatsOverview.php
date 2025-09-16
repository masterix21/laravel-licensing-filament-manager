<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class LicenseStatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        $licenseModel = config('licensing.models.license');
        $licenseUsageModel = config('licensing.models.license_usage');
        $licenseScopeModel = config('licensing.models.license_scope');

        $totalLicenses = $licenseModel::count();
        $activeLicenses = $licenseModel::where('is_active', true)
            ->where(function ($query) {
                $query->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            })
            ->count();
        $totalUsages = $licenseUsageModel::count();
        $totalScopes = $licenseScopeModel::count();

        return [
            Stat::make(__('laravel-licensing-filament-manager::licensing.widgets.stats.total_licenses'), $totalLicenses)
                ->description(__('laravel-licensing-filament-manager::licensing.widgets.stats.total_licenses_description'))
                ->descriptionIcon('heroicon-m-key')
                ->color('primary'),
            Stat::make(__('laravel-licensing-filament-manager::licensing.widgets.stats.active_licenses'), $activeLicenses)
                ->description(__('laravel-licensing-filament-manager::licensing.widgets.stats.active_licenses_description'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),
            Stat::make(__('laravel-licensing-filament-manager::licensing.widgets.stats.total_usages'), $totalUsages)
                ->description(__('laravel-licensing-filament-manager::licensing.widgets.stats.total_usages_description'))
                ->descriptionIcon('heroicon-m-chart-bar')
                ->color('info'),
            Stat::make(__('laravel-licensing-filament-manager::licensing.widgets.stats.license_scopes'), $totalScopes)
                ->description(__('laravel-licensing-filament-manager::licensing.widgets.stats.license_scopes_description'))
                ->descriptionIcon('heroicon-m-rectangle-group')
                ->color('warning'),
        ];
    }
}
