<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
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
                    $this->record->activate();
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
                ->visible(fn () => $this->record->status === LicenseStatus::Active)
                ->action(function () {
                    $this->record->suspend();
                    $this->refreshFormData(['status']);

                    Notification::make()
                        ->title(__('laravel-licensing-filament-manager::license.notifications.suspended'))
                        ->warning()
                        ->send();
                }),

            Actions\Action::make('show_key')
                ->label(__('laravel-licensing-filament-manager::license.actions.show_key'))
                ->icon('heroicon-o-key')
                ->visible(fn () => $this->record->canRetrieveKey())
                ->action(function () {
                    $key = $this->record->retrieveKey();

                    Notification::make()
                        ->title(__('laravel-licensing-filament-manager::license.notifications.key_retrieved'))
                        ->body($key
                            ? __('laravel-licensing-filament-manager::license.notifications.key_value', ['key' => $key])
                            : __('laravel-licensing-filament-manager::license.notifications.key_unavailable'))
                        ->success()
                        ->persistent()
                        ->send();
                }),

            Actions\Action::make('regenerate_key')
                ->label(__('laravel-licensing-filament-manager::license.actions.regenerate_key'))
                ->icon('heroicon-o-arrow-path')
                ->color('gray')
                ->visible(fn () => $this->record->canRegenerateKey())
                ->requiresConfirmation()
                ->action(function () {
                    $newKey = $this->record->regenerateKey();

                    Notification::make()
                        ->title(__('laravel-licensing-filament-manager::license.notifications.key_regenerated'))
                        ->body(__('laravel-licensing-filament-manager::license.notifications.key_value', ['key' => $newKey]))
                        ->success()
                        ->persistent()
                        ->send();

                    $this->refreshFormData(['key_hash']);
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

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // If activated_at changes and expires_at is not manually set, recalculate it
        if (isset($data['activated_at']) &&
            $data['activated_at'] !== $this->record->activated_at &&
            ! array_key_exists('expires_at', $data)) {

            $baseDate = \Carbon\Carbon::parse($data['activated_at']);

            if ($this->record->scope && $this->record->scope->default_duration_days) {
                $data['expires_at'] = $baseDate->copy()->addDays($this->record->scope->default_duration_days);
            } elseif ($defaultDays = config('licensing.default_license_duration_in_days')) {
                $data['expires_at'] = $baseDate->copy()->addDays($defaultDays);
            }
        }

        return $data;
    }
}
