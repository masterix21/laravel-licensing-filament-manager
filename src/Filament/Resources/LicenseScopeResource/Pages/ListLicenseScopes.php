<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource;

class ListLicenseScopes extends ListRecords
{
    protected static string $resource = LicenseScopeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('laravel-licensing-filament-manager::license-scope.actions.create')),
        ];
    }
}
