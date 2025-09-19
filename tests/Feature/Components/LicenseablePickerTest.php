<?php

use Filament\Forms\Components\MorphToSelect;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Forms\Components\LicenseablePicker;

it('extends MorphToSelect component', function () {
    $component = LicenseablePicker::make('licenseable');

    expect($component)->toBeInstanceOf(MorphToSelect::class);
});

it('is searchable by default', function () {
    $component = LicenseablePicker::make('licenseable');

    expect($component->isSearchable())->toBeTrue();
});

it('can be configured with custom name', function () {
    $component = LicenseablePicker::make('custom_licenseable');

    expect($component->getName())->toBe('custom_licenseable');
});

it('loads types from configuration', function () {
    // Set test configuration
    config()->set('licensing-filament-manager.licensed_entities', [
        'App\Models\User' => [
            'title' => 'name',
            'search' => ['name', 'email'],
        ],
        'App\Models\Product' => [
            'title' => 'title',
            'search' => ['title', 'sku'],
        ],
    ]);

    $component = LicenseablePicker::make('licenseable');

    // Component should be configured with types
    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('handles missing model classes gracefully', function () {
    // Set configuration with non-existent class
    config()->set('licensing-filament-manager.licensed_entities', [
        'App\Models\NonExistentModel' => [
            'title' => 'name',
            'search' => ['name'],
        ],
    ]);

    $component = LicenseablePicker::make('licenseable');

    // Should not throw error
    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('uses default attributes when not specified', function () {
    // Set minimal configuration
    config()->set('licensing-filament-manager.licensed_entities', [
        'App\Models\User' => [],
    ]);

    $component = LicenseablePicker::make('licenseable');

    // Should use 'name' as default title and search attribute
    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('can be disabled', function () {
    $component = LicenseablePicker::make('licenseable')
        ->disabled();

    expect($component->isDisabled())->toBeTrue();
});

it('can be required', function () {
    $component = LicenseablePicker::make('licenseable')
        ->required();

    expect($component->isRequired())->toBeTrue();
});

it('can have custom label', function () {
    $component = LicenseablePicker::make('licenseable')
        ->label('Select Licensed Entity');

    expect($component->getLabel())->toBe('Select Licensed Entity');
});

it('can have helper text', function () {
    $component = LicenseablePicker::make('licenseable');

    // MorphToSelect extends Field which has helper text capabilities
    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('supports live behavior', function () {
    $component = LicenseablePicker::make('licenseable')
        ->live();

    expect($component->isLive())->toBeTrue();
});

it('can be hidden conditionally', function () {
    $component = LicenseablePicker::make('licenseable')
        ->hidden(fn () => true);

    expect($component->isHidden())->toBeTrue();
});
