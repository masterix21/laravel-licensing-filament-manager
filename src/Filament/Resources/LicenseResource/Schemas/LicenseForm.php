<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;
use LucaLongo\Licensing\Models\LicenseScope;

class LicenseForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make(__('laravel-licensing-filament-manager::license.form.basic_information'))
                    ->schema([
                        Forms\Components\Placeholder::make('uid')
                            ->label(__('laravel-licensing-filament-manager::license.fields.id'))
                            ->content(fn (?License $record) => $record?->uid)
                            ->hidden(fn (?License $record) => $record === null),

                        Forms\Components\Select::make('license_scope_id')
                            ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                            ->relationship('scope', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.name'))
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Textarea::make('description')
                                    ->label(__('laravel-licensing-filament-manager::license-scope.fields.description'))
                                    ->maxLength(65535),
                            ]),

                        Forms\Components\Select::make('template_id')
                            ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                            ->preload()
                            ->searchable()
                            ->required()
                            ->options(function (callable $get, ?License $record) {
                                $scopeId = $get('license_scope_id') ?? $record?->license_scope_id;

                                if (! $scopeId) {
                                    return [];
                                }

                                $scope = LicenseScope::find($scopeId);

                                if (! $scope) {
                                    return [];
                                }

                                $query = $scope->templates()
                                    ->orderedByTier();

                                if (! $record?->template_id) {
                                    $query->active();
                                }

                                $templates = $query->pluck('name', 'id')->toArray();

                                if ($record && $record->template_id && ! array_key_exists($record->template_id, $templates)) {
                                    $templates[$record->template_id] = optional($record->template)->name ?? __('laravel-licensing-filament-manager::license.fields.template');
                                }

                                return $templates;
                            })
                            ->helperText(__('laravel-licensing-filament-manager::license.help.template')),

                        Forms\Components\MorphToSelect::make('licensable')
                            ->label(__('laravel-licensing-filament-manager::license.fields.licensable'))
                            ->searchable()
                            ->preload(),

                        Forms\Components\Select::make('status')
                            ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                            ->options(LicenseStatus::class)
                            ->required()
                            ->default(LicenseStatus::Pending->value),

                        Forms\Components\TextInput::make('max_usages')
                            ->label(__('laravel-licensing-filament-manager::license.fields.max_usages'))
                            ->numeric()
                            ->minValue(1)
                            ->default(1)
                            ->hiddenOn('create'),
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
                            ->nullable()
                            ->helperText(__('laravel-licensing-filament-manager::license.help.expires_at')),
                    ])
                    ->columns(2),

                Section::make(__('laravel-licensing-filament-manager::license.form.usage_statistics'))
                    ->schema([
                        Forms\Components\Placeholder::make('usages_count')
                            ->label(__('laravel-licensing-filament-manager::license.fields.usages'))
                            ->content(fn (?License $record) => $record?->usages()->count() ?? 0),

                        Forms\Components\Placeholder::make('remaining_usages')
                            ->label(__('laravel-licensing-filament-manager::license.fields.remaining_usages'))
                            ->content(fn (?License $record) => $record ? max(0, $record->max_usages - $record->usages()->count()) : 0),

                        Forms\Components\Placeholder::make('usage_percentage')
                            ->label(__('laravel-licensing-filament-manager::license.fields.usage_percentage'))
                            ->content(function (?License $record) {
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

                Section::make(__('laravel-licensing-filament-manager::license.form.security'))
                    ->schema([
                        Forms\Components\Placeholder::make('key_hash_display')
                            ->label(__('laravel-licensing-filament-manager::license.fields.key_hash'))
                            ->content(fn (?License $record) => $record?->key_hash)
                            ->hidden(fn (?License $record) => $record === null),

                        Forms\Components\Placeholder::make('retrieval_status')
                            ->label(__('laravel-licensing-filament-manager::license.fields.key_visibility'))
                            ->content(function (?License $record) {
                                if (! $record) {
                                    return __('laravel-licensing-filament-manager::license.security.key_not_yet_generated');
                                }

                                return $record->canRetrieveKey()
                                    ? __('laravel-licensing-filament-manager::license.security.key_retrievable')
                                    : __('laravel-licensing-filament-manager::license.security.key_not_retrievable');
                            })
                            ->hidden(fn (?License $record) => $record === null),
                    ])
                    ->columns(2)
                    ->hidden(fn (?License $record) => $record === null),
            ]);
    }
}
