<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource;

class EditLicenseScope extends EditRecord
{
    protected static string $resource = LicenseScopeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('rotate_keys')
                ->label(__('laravel-licensing-filament-manager::license-scope.actions.rotate_keys'))
                ->icon('heroicon-o-arrow-path')
                ->color('warning')
                ->requiresConfirmation()
                ->modalHeading(__('laravel-licensing-filament-manager::license-scope.actions.rotate_keys_modal_heading'))
                ->modalDescription(__('laravel-licensing-filament-manager::license-scope.actions.rotate_keys_modal_description'))
                ->visible(fn () => $this->record->key_rotation_days > 0)
                ->action(function () {
                    $this->record->rotateKeys(__('laravel-licensing-filament-manager::license-scope.actions.manual_rotation'));
                    $this->refreshFormData(['last_key_rotation_at', 'next_key_rotation_at']);
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
        return __('laravel-licensing-filament-manager::license-scope.notifications.updated');
    }
}
