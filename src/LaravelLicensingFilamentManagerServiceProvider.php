<?php

namespace LucaLongo\LaravelLicensingFilamentManager;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelLicensingFilamentManagerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'laravel-licensing-filament-manager';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name(static::$name)
            ->hasTranslations()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        // Ensure translations are loaded
        $this->loadTranslationsFrom(__DIR__.'/../lang', static::$name);
    }
}
