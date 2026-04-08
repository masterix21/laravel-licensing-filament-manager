<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource;

class EditLicenseTemplate extends EditRecord
{
    protected static string $resource = LicenseTemplateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
