<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use LucaLongo\Licensing\Models\LicenseScope;

class LicenseScopeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns()
            ->schema([
                Section::make(__('laravel-licensing-filament-manager::license-scope.form.basic_information'))
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
                            ->regex('/^[a-z0-9]+(?:-[a-z0-9]+)*$/')
                            ->helperText(__('laravel-licensing-filament-manager::license-scope.fields.slug_help')),

                        Forms\Components\TextInput::make('identifier')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.identifier'))
                            ->maxLength(255)
                            ->unique(LicenseScope::class, 'identifier', ignoreRecord: true)
                            ->helperText(__('laravel-licensing-filament-manager::license-scope.fields.identifier_help')),

                        Forms\Components\Textarea::make('description')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.description'))
                            ->maxLength(65535)
                            ->rows(3)
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_active')
                            ->label(__('laravel-licensing-filament-manager::license-scope.fields.is_active'))
                            ->default(true),
                    ]),

                Grid::make()
                    ->columns(1)
                    ->schema([
                        Section::make(__('laravel-licensing-filament-manager::license-scope.form.default_license_settings'))
                            ->columns()
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
                            ]),

                        Section::make(__('laravel-licensing-filament-manager::license-scope.form.key_rotation_settings'))
                            ->columns()
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
                            ->hiddenOn('create'),
                    ]),

                Section::make(__('laravel-licensing-filament-manager::license-scope.form.metadata'))
                    ->columnSpan(2)
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
