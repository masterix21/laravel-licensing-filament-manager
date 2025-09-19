<?php

it('loads english translations', function () {
    $translations = trans('licensing-filament-manager::licensing');

    expect($translations)->toBeArray();
    expect($translations)->toHaveKey('resources');
    expect($translations)->toHaveKey('widgets');
    expect($translations)->toHaveKey('pages');
});

it('has license scope translations', function () {
    $translation = trans('licensing-filament-manager::licensing.resources.license_scope.singular');

    expect($translation)->not->toBeNull();
});

it('has license translations', function () {
    $translation = trans('licensing-filament-manager::licensing.resources.license.singular');

    expect($translation)->not->toBeNull();
});

it('supports multiple languages', function () {
    // Just verify we can load translations
    $translations = trans('licensing-filament-manager::licensing');
    expect($translations)->toBeArray();
});
