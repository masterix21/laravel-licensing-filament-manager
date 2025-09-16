<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Schemas;

use Filament\Forms;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use LucaLongo\Licensing\Models\LicenseScope;

class LicenseScopeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(__('laravel-licensing-filament-manager::license-scope.form.basic_information'))
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Set $set) {
                                if ($operation !== 'create') {
                                    return;
                                }

                                $set('slug', str($state)->slug());
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.slug'))
                            ->required()
                            ->maxLength(255)
                            ->unique(LicenseScope::class, 'slug', ignoreRecord: true)
                            ->rules(['regex:/^[a-z0-9-]+$/']),

                        Forms\Components\TextInput::make('identifier')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.identifier'))
                            ->maxLength(255)
                            ->unique(LicenseScope::class, 'identifier', ignoreRecord: true)
                            ->helperText(__('laravel-licensing-filament-manager::license-scope.fields.identifier_help')),

                        Forms\Components\Textarea::make('description')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.description'))
                            ->maxLength(65535)
                            ->rows(3),

                        Forms\Components\Toggle::make('is_active')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.is_active'))
                            ->default(true),
                    ])
                    ->columns(2),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.default_license_settings'))
                    ->description(__('laravel-licensing-filament-manager::license-scope.form.default_license_settings_description'))
                    ->schema([
                        Forms\Components\TextInput::make('default_max_usages')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_max_usages'))
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->required(),

                        Forms\Components\TextInput::make('default_duration_days')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_duration_days'))
                            ->numeric()
                            ->minValue(1)
                            ->helperText(__('laravel-licensing-filament-manager::license-scope.fields.default_duration_days_help')),

                        Forms\Components\TextInput::make('default_grace_days')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_grace_days'))
                            ->numeric()
                            ->minValue(0)
                            ->default(14),
                    ])
                    ->columns(3),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.key_rotation_settings'))
                    ->description(__('laravel-licensing-filament-manager::license-scope.form.key_rotation_settings_description'))
                    ->schema([
                        Forms\Components\TextInput::make('key_rotation_days')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.key_rotation_days'))
                            ->numeric()
                            ->minValue(0)
                            ->default(90)
                            ->helperText(__('laravel-licensing-filament-manager::license-scope.fields.key_rotation_days_help')),

                        Forms\Components\DateTimePicker::make('last_key_rotation_at')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.last_key_rotation_at'))
                            ->displayFormat('d/m/Y H:i')
                            ->disabled()
                            ->dehydrated(false),

                        Forms\Components\DateTimePicker::make('next_key_rotation_at')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.next_key_rotation_at'))
                            ->displayFormat('d/m/Y H:i')
                            ->disabled()
                            ->dehydrated(false),
                    ])
                    ->columns(3)
                    ->hiddenOn('create'),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.statistics'))
                    ->schema([
                        TextEntry::make('licenses_count')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.licenses_count'))
                            ->state(fn (?LicenseScope $record) => $record?->licenses()->count() ?? 0),

                        TextEntry::make('active_licenses_count')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.active_licenses_count'))
                            ->state(fn (?LicenseScope $record) => $record?->licenses()->where('status', 'active')->count() ?? 0),

                        TextEntry::make('signing_keys_count')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.signing_keys_count'))
                            ->state(fn (?LicenseScope $record) => $record?->signingKeys()->count() ?? 0),
                    ])
                    ->columns(3)
                    ->hiddenOn('create'),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.metadata'))
                    ->schema([
                        Forms\Components\KeyValue::make('meta')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.meta'))
                            ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                            ->valueLabel(__('laravel-licensing-filament-manager::common.value')),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }
}
