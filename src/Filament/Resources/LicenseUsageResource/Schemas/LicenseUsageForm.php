<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;

class LicenseUsageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\Select::make('license_id')
                    ->relationship('license', 'key')
                    ->required()
                    ->searchable(),
                Forms\Components\TextInput::make('device_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('device_name')
                    ->maxLength(255),
                Forms\Components\Textarea::make('metadata')
                    ->columnSpanFull()
                    ->rows(3),
                Forms\Components\DateTimePicker::make('activated_at')
                    ->default(now()),
                Forms\Components\DateTimePicker::make('deactivated_at'),
            ]);
    }
}