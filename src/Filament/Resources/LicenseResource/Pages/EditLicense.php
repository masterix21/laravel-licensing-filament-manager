<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\Licensing\Enums\LicenseStatus;

class EditLicense extends EditRecord
{
    protected static string $resource = LicenseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('activate')
                ->label(__('laravel-licensing-filament-manager::license.actions.activate'))
                ->icon('heroicon-o-play')
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn () => $this->record->status === LicenseStatus::Pending)
                ->action(function () {
                    $this->record->update([
                        'status' => LicenseStatus::Active,
                        'activated_at' => now(),
                    ]);
                    $this->refreshFormData(['status', 'activated_at']);
                }),

            Actions\Action::make('suspend')
                ->label(__('laravel-licensing-filament-manager::license.actions.suspend'))
                ->icon('heroicon-o-pause')
                ->color('warning')
                ->requiresConfirmation()
                ->visible(fn () => $this->record->status === LicenseStatus::Active)
                ->action(function () {
                    $this->record->update(['status' => LicenseStatus::Suspended]);
                    $this->refreshFormData(['status']);
                }),

            Actions\ViewAction::make()
                ->label(__('laravel-licensing-filament-manager::common.actions.view')),

            Actions\DeleteAction::make()
                ->label(__('laravel-licensing-filament-manager::common.actions.delete')),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getSavedNotificationTitle(): ?string
    {
        return __('laravel-licensing-filament-manager::license.notifications.updated');
    }
}
