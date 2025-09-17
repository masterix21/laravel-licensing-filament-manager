<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Carbon\CarbonInterface;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\Licensing\Enums\LicenseStatus;

class ViewLicense extends ViewRecord
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

            Actions\Action::make('renew')
                ->label(__('laravel-licensing-filament-manager::license.actions.renew'))
                ->icon('heroicon-o-arrow-path')
                ->color('info')
                ->form([
                    Forms\Components\TextInput::make('duration_days')
                        ->label(__('laravel-licensing-filament-manager::license.fields.duration_days'))
                        ->numeric()
                        ->minValue(1)
                        ->default(365)
                        ->required(),
                ])
                ->action(function (array $data) {
                    $baseDate = $this->record->expires_at instanceof CarbonInterface && $this->record->expires_at->isFuture()
                        ? $this->record->expires_at
                        : now();

                    $newExpiresAt = $baseDate->copy()->addDays($data['duration_days']);

                    $this->record->renew($newExpiresAt);

                    $this->refreshFormData(['expires_at', 'status']);

                    Notification::make()
                        ->title(__('laravel-licensing-filament-manager::license.notifications.renewed'))
                        ->success()
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

            Actions\EditAction::make()
                ->label(__('laravel-licensing-filament-manager::common.actions.edit')),
        ];
    }
}
