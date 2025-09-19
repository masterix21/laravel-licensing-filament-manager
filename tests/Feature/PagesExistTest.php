<?php

use LucaLongo\LaravelLicensingFilamentManager\Filament\Pages\LicensingStatistics;

it('licensing statistics page exists', function () {
    expect(class_exists(LicensingStatistics::class))->toBeTrue();
});

it('licensing statistics page has navigation configuration', function () {
    expect(LicensingStatistics::getNavigationLabel())
        ->toBe(__('licensing-filament-manager::licensing.pages.statistics.title'));
});