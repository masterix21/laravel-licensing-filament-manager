<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;

class CreateLicense extends CreateRecord
{
    protected static string $resource = LicenseResource::class;

    protected ?string $generatedKey = null;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return __('laravel-licensing-filament-manager::license.notifications.created');
    }

    protected function handleRecordCreation(array $data): Model
    {
        $licenseModel = config('licensing.models.license');
        $templateModel = config('licensing.models.license_template');

        $this->generatedKey = Str::uuid()->toString();
        $data['key_hash'] = $licenseModel::hashKey($this->generatedKey);

        $templateId = $data['template_id'] ?? null;

        if ($templateId) {
            $template = $templateModel::find($templateId);

            if ($template) {
                return $licenseModel::createFromTemplate($template, $data);
            }
        }

        return $licenseModel::create($data);
    }

    protected function afterCreate(): void
    {
        if ($this->generatedKey) {
            Notification::make()
                ->title(__('laravel-licensing-filament-manager::license.notifications.key_generated'))
                ->body(__('laravel-licensing-filament-manager::license.notifications.key_value', ['key' => $this->generatedKey]))
                ->success()
                ->persistent()
                ->send();

            return;
        }

        Notification::make()
            ->title(__('laravel-licensing-filament-manager::license.notifications.created'))
            ->success()
            ->send();
    }
}
