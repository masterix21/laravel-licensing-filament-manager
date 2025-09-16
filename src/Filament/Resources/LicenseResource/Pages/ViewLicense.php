<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;

use Filament\Actions;
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

            Actions\Action::make('renew')
                ->label(__('laravel-licensing-filament-manager::license.actions.renew'))
                ->icon('heroicon-o-arrow-path')
                ->color('info')
                ->form([
                    \Filament\Forms\Components\TextInput::make('duration_days')
                        ->label(__('laravel-licensing-filament-manager::license.fields.duration_days'))
                        ->numeric()
                        ->minValue(1)
                        ->default(365)
                        ->required(),
                ])
                ->action(function (array $data) {
                    $newExpiresAt = $this->record->expires_at && $this->record->expires_at->isFuture()
                        ? $this->record->expires_at->addDays($data['duration_days'])
                        : now()->addDays($data['duration_days']);

                    $this->record->update([
                        'expires_at' => $newExpiresAt,
                        'status' => LicenseStatus::Active,
                    ]);

                    $this->refreshFormData(['expires_at', 'status']);
                }),

            Actions\EditAction::make()
                ->label(__('laravel-licensing-filament-manager::common.actions.edit')),
        ];
    }
}
