<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource;

class ViewLicenseTemplate extends ViewRecord
{
    protected static string $resource = LicenseTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
