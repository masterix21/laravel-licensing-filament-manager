<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Enums\UsageStatus;
use LucaLongo\Licensing\Models\License;
use LucaLongo\Licensing\Models\LicenseScope;
use LucaLongo\Licensing\Models\LicenseUsage;

class LicenseStatsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $totalLicenses = License::count();

        $activeLicenses = License::query()
            ->whereIn('status', [LicenseStatus::Active, LicenseStatus::Grace])
            ->where(function ($query) {
                $query
                    ->whereNull('expires_at')
                    ->orWhere('expires_at', '>', now());
            })
            ->count();

        $expiringLicenses = License::query()
            ->where('status', LicenseStatus::Active)
            ->whereBetween('expires_at', [now(), now()->addDays(30)])
            ->count();

        $totalUsages = LicenseUsage::where('status', UsageStatus::Active)->count();
        $totalScopes = LicenseScope::where('is_active', true)->count();

        return [
            Stat::make(__('laravel-licensing-filament-manager::widgets.total_licenses'), $totalLicenses)
                ->description(__('laravel-licensing-filament-manager::widgets.all_licenses_count'))
                ->descriptionIcon('heroicon-m-key')
                ->color('primary'),

            Stat::make(__('laravel-licensing-filament-manager::widgets.active_licenses'), $activeLicenses)
                ->description($activeLicenses > 0 ? __('laravel-licensing-filament-manager::widgets.currently_active') : __('laravel-licensing-filament-manager::widgets.no_active_licenses'))
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success'),

            Stat::make(__('laravel-licensing-filament-manager::widgets.expiring_soon'), $expiringLicenses)
                ->description(__('laravel-licensing-filament-manager::widgets.expiring_30_days'))
                ->descriptionIcon('heroicon-m-exclamation-triangle')
                ->color($expiringLicenses > 0 ? 'warning' : 'success'),

            Stat::make(__('laravel-licensing-filament-manager::widgets.active_usages'), $totalUsages)
                ->description(__('laravel-licensing-filament-manager::widgets.seats_in_use'))
                ->descriptionIcon('heroicon-m-users')
                ->color('info'),

            Stat::make(__('laravel-licensing-filament-manager::widgets.license_scopes'), $totalScopes)
                ->description(__('laravel-licensing-filament-manager::widgets.active_scopes'))
                ->descriptionIcon('heroicon-m-rectangle-group')
                ->color('gray'),
        ];
    }
}
