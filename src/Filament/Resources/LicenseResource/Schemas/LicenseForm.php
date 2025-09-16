<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Schemas;

use Filament\Forms;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;

class LicenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(__('laravel-licensing-filament-manager::license.form.basic_information'))
                    ->schema([
                        TextEntry::make('id')
                            ->label(__('laravel-licensing-filament-manager::license.fields.id'))
                            ->copyable(),

                        Forms\Components\TextInput::make('key_hash')
                            ->label(__('laravel-licensing-filament-manager::license.fields.key_hash'))
                            ->disabled()
                            ->dehydrated(false)
                            ->visible(fn (?License $record) => $record?->key_hash),

                        Forms\Components\Select::make('status')
                            ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                            ->options(LicenseStatus::class)
                            ->required()
                            ->live(),

                        Forms\Components\Select::make('license_scope_id')
                            ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                            ->relationship('licenseScope', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.name'))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.description'))
                                    ->maxLength(65535),
                            ]),

                        Forms\Components\MorphToSelect::make('licensable')
                            ->label(__('laravel-licensing-filament-manager::license.fields.licensable'))
                            ->searchable()
                            ->preload(),

                        Forms\Components\TextInput::make('max_usages')
                            ->label(__('laravel-licensing-filament-manager::license.fields.max_usages'))
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->required(),
                    ])
                    ->columns(2),

                Section::make(__('laravel-licensing-filament-manager::license.form.dates_activation'))
                    ->schema([
                        Forms\Components\DateTimePicker::make('activated_at')
                            ->label(__('laravel-licensing-filament-manager::license.fields.activated_at'))
                            ->displayFormat('d/m/Y H:i'),

                        Forms\Components\DateTimePicker::make('expires_at')
                            ->label(__('laravel-licensing-filament-manager::license.fields.expires_at'))
                            ->displayFormat('d/m/Y H:i')
                            ->required(),
                    ])
                    ->columns(2),

                Section::make(__('laravel-licensing-filament-manager::license.form.usage_statistics'))
                    ->schema([
                        TextEntry::make('usages_count')
                            ->label(__('laravel-licensing-filament-manager::license.fields.usages'))
                            ->state(fn (?License $record) => $record?->usages()->count() ?? 0),

                        TextEntry::make('remaining_usages')
                            ->label(__('laravel-licensing-filament-manager::license.fields.remaining_usages'))
                            ->state(fn (?License $record) => $record ? max(0, $record->max_usages - $record->usages()->count()) : 0),

                        TextEntry::make('usage_percentage')
                            ->label(__('laravel-licensing-filament-manager::license.fields.usage_percentage'))
                            ->state(function (?License $record) {
                                if (! $record || $record->max_usages === 0) {
                                    return '0%';
                                }
                                $percentage = ($record->usages()->count() / $record->max_usages) * 100;

                                return round($percentage, 1).'%';
                            }),
                    ])
                    ->columns(3)
                    ->hiddenOn('create'),

                Section::make(__('laravel-licensing-filament-manager::license.form.metadata'))
                    ->schema([
                        Forms\Components\KeyValue::make('meta')
                            ->label(__('laravel-licensing-filament-manager::license.fields.meta'))
                            ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                            ->valueLabel(__('laravel-licensing-filament-manager::common.value')),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}
