<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;

class LicensingStatistics extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar';

    protected string $view = 'laravel-licensing-filament-manager::pages.licensing-statistics';

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
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\LicenseStatsOverview::class,
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\RecentLicenseActivations::class,
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\ExpiringLicenses::class,
        ];
    }

    public function getColumns(): int | array
    {
        return 2;
    }
}