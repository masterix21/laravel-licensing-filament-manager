<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;

class EditLicense extends EditRecord
{
    protected static string $resource = LicenseResource::class;

    protected function getHeaderActions(): array
    {
        /** @var License $record */
        $record = $this->record;

        return [
            Actions\Action::make('activate')
                ->label(__('laravel-licensing-filament-manager::license.actions.activate'))
                ->icon('heroicon-o-play')
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn () => $record->status === LicenseStatus::Pending)
                ->action(function () use ($record) {
                    $record->activate();
                    $this->refreshFormData(['status', 'activated_at']);

                    Notification::make()
                        ->title(__('laravel-licensing-filament-manager::license.notifications.activated'))
                        ->success()
                        ->send();
                }),

            Actions\Action::make('suspend')
                ->label(__('laravel-licensing-filament-manager::license.actions.suspend'))
                ->icon('heroicon-o-pause')
                ->color('warning')
                ->requiresConfirmation()
                ->visible(fn () => $record->status === LicenseStatus::Active)
                ->action(function () use ($record) {
                    $record->suspend();
                    $this->refreshFormData(['status']);

                    Notification::make()
                        ->title(__('laravel-licensing-filament-manager::license.notifications.suspended'))
                        ->warning()
                        ->send();
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
