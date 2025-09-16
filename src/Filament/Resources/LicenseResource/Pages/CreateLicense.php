<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;

class CreateLicense extends CreateRecord
{
    protected static string $resource = LicenseResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('laravel-licensing-filament-manager::license.notifications.created');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Use defaults from license scope if not provided
        if (isset($data['license_scope_id'])) {
            $licenseScope = \LucaLongo\Licensing\Models\LicenseScope::find($data['license_scope_id']);

            if ($licenseScope) {
                // Use scope defaults if not explicitly set
                if (! isset($data['max_usages'])) {
                    $data['max_usages'] = $licenseScope->default_max_usages;
                }

                if (! isset($data['expires_at']) && $licenseScope->default_duration_days) {
                    $data['expires_at'] = now()->addDays($licenseScope->default_duration_days);
                }
            }
        }

        return $data;
    }
}
