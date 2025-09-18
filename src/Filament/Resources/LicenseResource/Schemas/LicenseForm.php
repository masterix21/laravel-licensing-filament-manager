<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Schemas;

use Carbon\Carbon;
use Filament\Forms;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Forms\Components\LicenseablePicker;
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
                    ->columns(1)
                    ->schema([
                        TextEntry::make('uid')
                            ->label(__('laravel-licensing-filament-manager::license.fields.id'))
                            ->state(fn (?License $record) => $record?->uid)
                            ->hidden(fn (?License $record) => $record === null),

                        Forms\Components\Select::make('license_scope_id')
                            ->label(__('laravel-licensing-filament-manager::license.fields.license_scope'))
                            ->relationship('scope', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->default(function ($livewire) {
                                if (method_exists($livewire, 'getOwnerRecord')) {
                                    return $livewire->getOwnerRecord()->id;
                                }

                                return null;
                            })
                            ->hidden(fn ($livewire) => method_exists($livewire, 'getOwnerRecord'))
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
                            ->live()
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
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                if (! $state) {
                                    $set('expires_at', null);

                                    return;
                                }

                                $templateModel = config('licensing.models.license_template');
                                $template = $templateModel::find($state);

                                if (! $template) {
                                    $set('expires_at', null);

                                    return;
                                }

                                if ($template->license_duration_days && $template->license_duration_days > 0) {
                                    // Get the activation date or use now() as default
                                    $activatedAt = $get('activated_at') ?? now();
                                    $expiresAt = Carbon::parse($activatedAt)->addDays($template->license_duration_days);
                                    $set('expires_at', $expiresAt->format('Y-m-d H:i:s'));
                                }
                            })
                            ->helperText(__('laravel-licensing-filament-manager::license.help.template')),

                        LicenseablePicker::make('licensable')
                            ->label(__('laravel-licensing-filament-manager::license.fields.licensable')),

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
                    ]),

                Grid::make()
                    ->columns(1)
                    ->schema([
                        Section::make(__('laravel-licensing-filament-manager::license.form.dates_activation'))
                            ->schema([
                                Forms\Components\DateTimePicker::make('activated_at')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.activated_at'))
                                    ->displayFormat('d/m/Y H:i')
                                    ->default(now())
                                    ->live()
                                    ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                        // Only recalculate if we have a template with duration
                                        $templateId = $get('template_id');
                                        if (! $templateId || ! $state) {
                                            return;
                                        }

                                        $templateModel = config('licensing.models.license_template');
                                        $template = $templateModel::find($templateId);
                                        if (! $template || ! $template->license_duration_days) {
                                            return;
                                        }

                                        // Recalculate expires_at based on new activated_at
                                        $expiresAt = Carbon::parse($state)->addDays($template->license_duration_days);
                                        $set('expires_at', $expiresAt->format('Y-m-d H:i:s'));
                                    }),

                                Forms\Components\DateTimePicker::make('expires_at')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.expires_at'))
                                    ->displayFormat('d/m/Y H:i')
                                    ->nullable()
                                    ->helperText(__('laravel-licensing-filament-manager::license.help.expires_at')),
                            ])
                            ->columns(),

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

                        Section::make(__('laravel-licensing-filament-manager::license.form.security'))
                            ->schema([
                                TextEntry::make('key_hash_display')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.key_hash'))
                                    ->state(fn (?License $record) => $record?->key_hash)
                                    ->hidden(fn (?License $record) => $record === null),

                                TextEntry::make('retrieval_status')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.key_visibility'))
                                    ->state(function (?License $record) {
                                        if (! $record) {
                                            return __('laravel-licensing-filament-manager::license.security.key_not_yet_generated');
                                        }

                                        return $record->canRetrieveKey()
                                            ? __('laravel-licensing-filament-manager::license.security.key_retrievable')
                                            : __('laravel-licensing-filament-manager::license.security.key_not_retrievable');
                                    })
                                    ->hidden(fn (?License $record) => $record === null),
                            ])
                            ->columns(1)
                            ->hidden(fn (?License $record) => $record === null),
                    ]),

                Section::make(__('laravel-licensing-filament-manager::license.form.metadata'))
                    ->columnSpan(2)
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
