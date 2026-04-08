<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource;

class ListLicenseTemplates extends ListRecords
{
    protected static string $resource = LicenseTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
