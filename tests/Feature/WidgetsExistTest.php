<?php

use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\ExpiringLicenses;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\LicenseStatsOverview;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\LicenseStatsWidget;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\RecentLicenseActivations;

it('license stats overview widget exists', function () {
    expect(class_exists(LicenseStatsOverview::class))->toBeTrue();
});

it('license stats widget exists', function () {
    expect(class_exists(LicenseStatsWidget::class))->toBeTrue();
});

it('expiring licenses widget exists', function () {
    expect(class_exists(ExpiringLicenses::class))->toBeTrue();
});

it('recent license activations widget exists', function () {
    expect(class_exists(RecentLicenseActivations::class))->toBeTrue();
});
