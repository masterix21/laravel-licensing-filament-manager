<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource;

class EditLicenseUsage extends EditRecord
{
    protected static string $resource = LicenseUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}