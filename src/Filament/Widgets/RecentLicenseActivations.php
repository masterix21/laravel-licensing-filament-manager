<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use LucaLongo\Licensing\Enums\UsageStatus;

class RecentLicenseActivations extends BaseWidget
{
    public function getHeading(): string
    {
        return __('laravel-licensing-filament-manager::licensing.widgets.recent_usages.heading');
    }

    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        $licenseUsageModel = config('licensing.models.license_usage');

        return $table
            ->query(
                $licenseUsageModel::query()
                    ->with(['license', 'license.scope'])
                    ->latest('registered_at')
                    ->limit(10)
            )
            ->columns([
                Tables\Columns\TextColumn::make('license.uid')
                    ->label(__('laravel-licensing-filament-manager::license.fields.id'))
                    ->tooltip(fn ($record) => $record->license?->id)
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('license.scope.name')
                    ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                    ->badge()
                    ->color('info')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('usage_fingerprint')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.usage_fingerprint'))
                    ->copyable()
                    ->limit(20)
                    ->searchable(),
                Tables\Columns\TextColumn::make('client_type')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.client_type'))
                    ->badge()
                    ->color('gray')
                    ->toggleable(),
                Tables\Columns\TextColumn::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.status'))
                    ->badge()
                    ->colors([
                        'success' => UsageStatus::Active,
                        'danger' => UsageStatus::Revoked,
                    ]),
                Tables\Columns\TextColumn::make('registered_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.registered_at'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('last_seen_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.last_seen_at'))
                    ->dateTime()
                    ->sortable()
                    ->color(fn ($state) => $state && $state->diffInDays() > 7 ? 'warning' : 'success'),
            ])
            ->paginated(false);
    }
}
