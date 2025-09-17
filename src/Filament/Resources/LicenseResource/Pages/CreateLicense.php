<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Crypt;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\Licensing\Contracts\LicenseKeyGeneratorContract;
use LucaLongo\Licensing\Models\License;
use LucaLongo\Licensing\Models\LicenseScope;
use LucaLongo\Licensing\Services\TemplateService;

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

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return $data;
    }

    protected function handleRecordCreation(array $data): License
    {
        $templateId = $data['template_id'];
        unset($data['template_id']);

        $scope = LicenseScope::findOrFail($data['license_scope_id']);

        /** @var TemplateService $templateService */
        $templateService = app(TemplateService::class);

        $record = $templateService->createLicenseForScope($scope, $templateId, $data);

        $this->generatedKey = null;

        try {
            if ($record->canRegenerateKey()) {
                $this->generatedKey = $record->regenerateKey();
            } else {
                /** @var LicenseKeyGeneratorContract $generator */
                $generator = app(LicenseKeyGeneratorContract::class);
                $generated = $generator->generate($record);

                $meta = $record->meta?->toArray() ?? [];

                if ($record->canRetrieveKey()) {
                    $meta['encrypted_key'] = Crypt::encryptString($generated);
                    $this->generatedKey = $generated;
                }

                $record->update([
                    'key_hash' => License::hashKey($generated),
                    'meta' => $meta,
                ]);
            }
        } catch (\Throwable $exception) {
            report($exception);
        }

        return $record->refresh();
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
        } else {
            Notification::make()
                ->title(__('laravel-licensing-filament-manager::license.notifications.created'))
                ->success()
                ->send();
        }
    }
}
