<?php

namespace LucaLongo\LaravelLicensingFilamentManager;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Pages\LicensingStatistics;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\ExpiringLicenses;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\LicenseStatsOverview;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\RecentLicenseActivations;

class LaravelLicensingFilamentManagerPlugin implements Plugin
{
    use EvaluatesClosures;

    protected string|\Closure|null $navigationGroup = null;

    protected int|\Closure|null $navigationSort = null;

    protected bool|\Closure $enableStatistics = true;

    protected bool|\Closure $enableBulkActions = true;

    protected bool|\Closure $enableWidgets = true;

    public function getId(): string
    {
        return 'laravel-licensing-filament-manager';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->readOnlyRelationManagersOnResourceViewPagesByDefault(false)
            ->resources($this->getResources())
            ->pages($this->getPages())
            ->widgets($this->getWidgets());
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }

    public function navigationGroup(string|\Closure|null $group): static
    {
        $this->navigationGroup = $group;

        return $this;
    }

    public function navigationSort(int|\Closure|null $sort): static
    {
        $this->navigationSort = $sort;

        return $this;
    }

    public function enableStatistics(bool|\Closure $condition = true): static
    {
        $this->enableStatistics = $condition;

        return $this;
    }

    public function enableBulkActions(bool|\Closure $condition = true): static
    {
        $this->enableBulkActions = $condition;

        return $this;
    }

    public function enableWidgets(bool|\Closure $condition = true): static
    {
        $this->enableWidgets = $condition;

        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return $this->evaluate($this->navigationGroup);
    }

    public function getNavigationSort(): ?int
    {
        return $this->evaluate($this->navigationSort);
    }

    public function hasStatistics(): bool
    {
        return $this->evaluate($this->enableStatistics);
    }

    public function hasBulkActions(): bool
    {
        return $this->evaluate($this->enableBulkActions);
    }

    public function hasWidgets(): bool
    {
        return $this->evaluate($this->enableWidgets);
    }

    protected function getResources(): array
    {
        return [
            LicenseScopeResource::class,
            LicenseResource::class,
            LicenseTemplateResource::class,
            LicenseUsageResource::class,
        ];
    }

    protected function getPages(): array
    {
        if (! $this->hasStatistics()) {
            return [];
        }

        return [
            LicensingStatistics::class,
        ];
    }

    protected function getWidgets(): array
    {
        if (! $this->hasWidgets()) {
            return [];
        }

        return [
            LicenseStatsOverview::class,
            RecentLicenseActivations::class,
            ExpiringLicenses::class,
        ];
    }
}
