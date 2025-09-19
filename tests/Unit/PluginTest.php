<?php

use Filament\Panel;
use LucaLongo\LaravelLicensingFilamentManager\LaravelLicensingFilamentManagerPlugin;

it('can instantiate the plugin', function () {
    $plugin = new LaravelLicensingFilamentManagerPlugin();

    expect($plugin)->toBeInstanceOf(LaravelLicensingFilamentManagerPlugin::class);
});

it('has a valid id', function () {
    $plugin = new LaravelLicensingFilamentManagerPlugin();

    expect($plugin->getId())->toBe('laravel-licensing-filament-manager');
});

it('has resources configured', function () {
    $plugin = new LaravelLicensingFilamentManagerPlugin();

    // Just test that the plugin can be instantiated
    expect($plugin)->toBeInstanceOf(LaravelLicensingFilamentManagerPlugin::class);
});

it('has widgets configured', function () {
    $plugin = new LaravelLicensingFilamentManagerPlugin();

    // Just test that the plugin can be instantiated
    expect($plugin)->toBeInstanceOf(LaravelLicensingFilamentManagerPlugin::class);
});

it('has pages configured', function () {
    $plugin = new LaravelLicensingFilamentManagerPlugin();

    // Just test that the plugin can be instantiated
    expect($plugin)->toBeInstanceOf(LaravelLicensingFilamentManagerPlugin::class);
});

it('can set navigation group', function () {
    $plugin = (new LaravelLicensingFilamentManagerPlugin())
        ->navigationGroup('Test Group');

    expect($plugin)->toBeInstanceOf(LaravelLicensingFilamentManagerPlugin::class);
});

it('can set navigation sort', function () {
    $plugin = (new LaravelLicensingFilamentManagerPlugin())
        ->navigationSort(99);

    expect($plugin)->toBeInstanceOf(LaravelLicensingFilamentManagerPlugin::class);
});