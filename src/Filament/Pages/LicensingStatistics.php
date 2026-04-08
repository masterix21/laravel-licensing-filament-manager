<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\ExpiringLicenses;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\LicenseStatsOverview;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\RecentLicenseActivations;

class LicensingStatistics extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    protected string $view = 'licensing-filament-manager::pages.licensing-statistics';

    public static function getNavigationLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.pages.statistics.navigation_label');
    }

    public function getTitle(): string
    {
        return __('laravel-licensing-filament-manager::licensing.pages.statistics.title');
    }

    protected static ?int $navigationSort = 99;

    public function getWidgets(): array
    {
        return [
            LicenseStatsOverview::class,
            RecentLicenseActivations::class,
            ExpiringLicenses::class,
        ];
    }

    public function getColumns(): int|array
    {
        return 2;
    }
}
