<x-filament-panels::page>
    <div class="fi-page-content">
        @livewire(\LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\LicenseStatsOverview::class)

        <div class="mt-6 grid gap-6 lg:grid-cols-2">
            @livewire(\LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\RecentLicenseActivations::class)
            @livewire(\LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\ExpiringLicenses::class)
        </div>
    </div>
</x-filament-panels::page>