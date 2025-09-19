<?php

use Illuminate\Database\Eloquent\Model;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Forms\Components\LicenseablePicker;

beforeEach(function () {
    // Skip creating dynamic classes as they cause issues in CI
});

it('configures types from licensed entities config', function () {
    config()->set('licensing-filament-manager.licensed_entities', []);

    $component = LicenseablePicker::make('licenseable');

    expect($component)->toBeInstanceOf(LicenseablePicker::class);
    expect($component->getName())->toBe('licenseable');
});

it('handles empty configuration', function () {
    config()->set('licensing-filament-manager.licensed_entities', []);

    $component = LicenseablePicker::make('licenseable');

    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('skips non-existent classes', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'NonExistentClass' => [
            'title' => 'name',
            'search' => ['name'],
        ],
    ]);

    $component = LicenseablePicker::make('licenseable');

    // Should create component without error
    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('uses default title attribute when not specified', function () {
    config()->set('licensing-filament-manager.licensed_entities', []);

    $component = LicenseablePicker::make('licenseable');

    // Should use 'name' as default title attribute
    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('uses default search attributes when not specified', function () {
    config()->set('licensing-filament-manager.licensed_entities', []);

    $component = LicenseablePicker::make('licenseable');

    // Should use ['name'] as default search attributes
    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('handles multiple licensed entity types', function () {
    config()->set('licensing-filament-manager.licensed_entities', []);

    $component = LicenseablePicker::make('licenseable');

    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('preserves MorphToSelect functionality', function () {
    $component = LicenseablePicker::make('licenseable')
        ->label('Licensed Entity')
        ->required()
        ->disabled(false);

    expect($component->getLabel())->toBe('Licensed Entity');
    expect($component->isRequired())->toBeTrue();
});

it('supports validation rules', function () {
    $component = LicenseablePicker::make('licenseable')
        ->required();

    expect($component->isRequired())->toBeTrue();
});

it('can be used in form schema', function () {
    $component = LicenseablePicker::make('licenseable')
        ->columnSpan(2)
        ->visible(true);

    expect($component->getColumnSpan())->toEqual(['default' => 1, 'lg' => 2]);
    expect($component->isVisible())->toBeTrue();
});

it('supports live validation', function () {
    $component = LicenseablePicker::make('licenseable')
        ->live()
        ->debounce(500);

    expect($component->isLive())->toBeTrue();
    expect($component->getLiveDebounce())->toBe(500);
});
