<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Carbon\CarbonInterface;
use Filament\Actions;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\ViewRecord;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;

class ViewLicense extends ViewRecord
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

            Actions\Action::make('renew')
                ->label(__('laravel-licensing-filament-manager::license.actions.renew'))
                ->icon('heroicon-o-arrow-path')
                ->color('info')
                ->schema([
                    Forms\Components\TextInput::make('duration_days')
                        ->label(__('laravel-licensing-filament-manager::license.fields.duration_days'))
                        ->numeric()
                        ->minValue(1)
                        ->default(365)
                        ->required(),
                ])
                ->action(function (array $data) use ($record) {
                    $baseDate = $record->expires_at instanceof CarbonInterface && $record->expires_at->isFuture()
                        ? $record->expires_at
                        : now();

                    $newExpiresAt = $baseDate->copy()->addDays($data['duration_days']);

                    $record->renew($newExpiresAt);

                    $this->refreshFormData(['expires_at', 'status']);

                    Notification::make()
                        ->title(__('laravel-licensing-filament-manager::license.notifications.renewed'))
                        ->success()
                        ->send();
                }),

            Actions\EditAction::make()
                ->label(__('laravel-licensing-filament-manager::common.actions.edit')),
        ];
    }
}
