<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource;

class ListLicenseUsages extends ListRecords
{
    protected static string $resource = LicenseUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}