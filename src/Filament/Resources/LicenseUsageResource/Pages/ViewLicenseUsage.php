<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource;

class ViewLicenseUsage extends ViewRecord
{
    protected static string $resource = LicenseUsageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
