<?php

use Illuminate\Support\Facades\File;
use LucaLongo\LaravelLicensingFilamentManager\LaravelLicensingFilamentManagerServiceProvider;

it('registers the service provider', function () {
    expect(app()->getProviders(LaravelLicensingFilamentManagerServiceProvider::class))
        ->not->toBeEmpty();
});

it('publishes config file', function () {
    $this->artisan('vendor:publish', [
        '--provider' => LaravelLicensingFilamentManagerServiceProvider::class,
        '--tag' => 'licensing-filament-manager-config',
    ])->assertSuccessful();
});

it('publishes translation files', function () {
    $this->artisan('vendor:publish', [
        '--provider' => LaravelLicensingFilamentManagerServiceProvider::class,
        '--tag' => 'licensing-filament-manager-translations',
    ])->assertSuccessful();
});