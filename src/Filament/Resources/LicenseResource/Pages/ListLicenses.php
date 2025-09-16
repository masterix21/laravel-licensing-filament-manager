<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;

class ListLicenses extends ListRecords
{
    protected static string $resource = LicenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label(__('laravel-licensing-filament-manager::license.actions.create')),
        ];
    }
}
