<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Schemas;

use Filament\Forms;
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
                    ->columns(2)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (?string $state, Set $set) {
                                if (! $state) {
                                    return;
                                }

                                $set('slug', str($state)->slug()->toString());
                            }),

                        Forms\Components\TextInput::make('slug')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.slug'))
                            ->required()
                            ->maxLength(255)
                            ->unique(LicenseScope::class, 'slug', ignoreRecord: true)
                            ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/'),

                        Forms\Components\TextInput::make('identifier')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.identifier'))
                            ->maxLength(255)
                            ->placeholder('com.company.product')
                            ->unique(LicenseScope::class, 'identifier', ignoreRecord: true),

                        Forms\Components\Toggle::make('is_active')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.is_active'))
                            ->default(true)
                            ->inline(false),

                        Forms\Components\Textarea::make('description')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.description'))
                            ->maxLength(65535)
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.default_license_settings'))
                    ->description(__('laravel-licensing-filament-manager::license-scope.form.default_license_settings_description'))
                    ->columns(3)
                    ->collapsible()
                    ->schema([
                        Forms\Components\TextInput::make('default_max_usages')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_max_usages'))
                            ->numeric()
                            ->minValue(1)
                            ->nullable()
                            ->suffix(__('laravel-licensing-filament-manager::license-scope.seats')),

                        Forms\Components\TextInput::make('default_duration_days')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_duration_days'))
                            ->numeric()
                            ->minValue(1)
                            ->nullable()
                            ->suffix(__('laravel-licensing-filament-manager::license-scope.days')),

                        Forms\Components\TextInput::make('default_grace_days')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.default_grace_days'))
                            ->numeric()
                            ->minValue(0)
                            ->nullable()
                            ->suffix(__('laravel-licensing-filament-manager::license-scope.days')),
                    ]),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.key_rotation_settings'))
                    ->description(__('laravel-licensing-filament-manager::license-scope.form.key_rotation_settings_description'))
                    ->columns(3)
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\TextInput::make('key_rotation_days')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.key_rotation_days'))
                            ->numeric()
                            ->minValue(0)
                            ->default(90)
                            ->suffix(__('laravel-licensing-filament-manager::license-scope.days'))
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
                    ->hiddenOn('create'),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.metadata'))
                    ->collapsible()
                    ->collapsed()
                    ->schema([
                        Forms\Components\KeyValue::make('meta')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.meta'))
                            ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                            ->valueLabel(__('laravel-licensing-filament-manager::common.value')),
                    ]),
            ]);
    }
}
