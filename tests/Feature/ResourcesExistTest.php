<?php

use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource;

it('license scope resource exists', function () {
    expect(class_exists(LicenseScopeResource::class))->toBeTrue();
});

it('license resource exists', function () {
    expect(class_exists(LicenseResource::class))->toBeTrue();
});

it('license usage resource exists', function () {
    expect(class_exists(LicenseUsageResource::class))->toBeTrue();
});
