<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource;

class CreateLicenseTemplate extends CreateRecord
{
    protected static string $resource = LicenseTemplateResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
