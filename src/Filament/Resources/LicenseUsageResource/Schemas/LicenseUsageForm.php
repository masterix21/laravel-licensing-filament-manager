<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use LucaLongo\Licensing\Enums\UsageStatus;

class LicenseUsageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('license_id')
                    ->relationship('license', 'uid')
                    ->label(__('laravel-licensing-filament-manager::licensing.fields.license_key'))
                    ->required()
                    ->searchable()
                    ->preload(),

                Forms\Components\TextInput::make('usage_fingerprint')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.usage_fingerprint'))
                    ->required()
                    ->maxLength(255)
                    ->helperText(__('laravel-licensing-filament-manager::license-usage.help.usage_fingerprint')),

                Forms\Components\Select::make('status')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.status'))
                    ->options(UsageStatus::class)
                    ->default(UsageStatus::Active->value)
                    ->required(),

                Forms\Components\TextInput::make('client_type')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.client_type'))
                    ->maxLength(255)
                    ->placeholder('desktop-app'),

                Forms\Components\TextInput::make('name')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.name'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('ip')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.ip'))
                    ->maxLength(45),

                Forms\Components\Textarea::make('user_agent')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.user_agent'))
                    ->rows(2)
                    ->columnSpanFull(),

                Forms\Components\DateTimePicker::make('registered_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.registered_at'))
                    ->default(now())
                    ->required(),

                Forms\Components\DateTimePicker::make('last_seen_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.last_seen_at'))
                    ->default(now())
                    ->nullable(),

                Forms\Components\DateTimePicker::make('revoked_at')
                    ->label(__('laravel-licensing-filament-manager::license-usage.fields.revoked_at'))
                    ->nullable()
                    ->visible(fn (callable $get) => $get('status') === UsageStatus::Revoked->value),

                Forms\Components\KeyValue::make('meta')
                    ->label(__('laravel-licensing-filament-manager::license.fields.meta'))
                    ->columnSpanFull()
                    ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                    ->valueLabel(__('laravel-licensing-filament-manager::common.value')),
            ]);
    }
}
