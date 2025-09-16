<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource;

class CreateLicenseScope extends CreateRecord
{
    protected static string $resource = LicenseScopeResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('laravel-licensing-filament-manager::license-scope.notifications.created');
    }
}
