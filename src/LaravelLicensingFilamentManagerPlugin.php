<?php

namespace LucaLongo\LaravelLicensingFilamentManager;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;

class LaravelLicensingFilamentManagerPlugin implements Plugin
{
    use EvaluatesClosures;

    protected string | \Closure | null $navigationGroup = null;

    protected int | \Closure | null $navigationSort = null;

    protected bool | \Closure $enableStatistics = true;

    protected bool | \Closure $enableBulkActions = true;

    protected bool | \Closure $enableWidgets = true;

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
        return filament(app(static::class)->getId());
    }

    public function navigationGroup(string | \Closure | null $group): static
    {
        $this->navigationGroup = $group;

        return $this;
    }

    public function navigationSort(int | \Closure | null $sort): static
    {
        $this->navigationSort = $sort;

        return $this;
    }

    public function enableStatistics(bool | \Closure $condition = true): static
    {
        $this->enableStatistics = $condition;

        return $this;
    }

    public function enableBulkActions(bool | \Closure $condition = true): static
    {
        $this->enableBulkActions = $condition;

        return $this;
    }

    public function enableWidgets(bool | \Closure $condition = true): static
    {
        $this->enableWidgets = $condition;

        return $this;
    }

    public function getNavigationGroup(): ?string
    {
        return $this->evaluate($this->navigationGroup) ?? __('licensing-filament-manager::licensing.navigation_group');
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
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource::class,
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource::class,
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource::class,
        ];
    }

    protected function getPages(): array
    {
        if (! $this->hasStatistics()) {
            return [];
        }

        return [
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Pages\LicensingStatistics::class,
        ];
    }

    protected function getWidgets(): array
    {
        if (! $this->hasWidgets()) {
            return [];
        }

        return [
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\LicenseStatsOverview::class,
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\RecentLicenseActivations::class,
            \LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets\ExpiringLicenses::class,
        ];
    }
}
