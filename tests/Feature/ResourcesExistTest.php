<?php

use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource;

it('license template resource exists', function () {
    expect(class_exists(LicenseTemplateResource::class))->toBeTrue();
});

it('license resource exists', function () {
    expect(class_exists(LicenseResource::class))->toBeTrue();
});

it('license usage resource exists', function () {
    expect(class_exists(LicenseUsageResource::class))->toBeTrue();
});
