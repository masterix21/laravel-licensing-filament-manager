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
use LucaLongo\Licensing\Services\EncryptedLicenseKeyRetriever;

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

                        Forms\Components\Select::make('template_id')
                            ->label(__('laravel-licensing-filament-manager::license.fields.template'))
                            ->preload()
                            ->searchable()
                            ->live()
                            ->options(function (?License $record) {
                                $templateModel = config('licensing.models.license_template');
                                $query = $templateModel::query()->orderedByTier();

                                if (! $record?->template_id) {
                                    $query->active();
                                }

                                $templates = $query->with('scope')->get()->mapWithKeys(function ($template) {
                                    $scopeName = $template->scope?->name;
                                    $label = $scopeName
                                        ? "[{$scopeName}] {$template->name}"
                                        : $template->name;

                                    return [$template->id => $label];
                                })->toArray();

                                if ($record?->template_id && ! array_key_exists($record->template_id, $templates)) {
                                    $templates[$record->template_id] = optional($record->template)->name ?? __('laravel-licensing-filament-manager::license.fields.template');
                                }

                                return $templates;
                            })
                            ->afterStateUpdated(function ($state, callable $set, callable $get) {
                                if (! $state) {
                                    $set('expires_at', null);

                                    return;
                                }

                                $template = config('licensing.models.license_template')::find($state);

                                if (! $template) {
                                    $set('expires_at', null);

                                    return;
                                }

                                $template->loadMissing('scope');

                                $durationDays = $template->license_duration_days
                                    ?? $template->scope?->default_duration_days;

                                if ($durationDays && $durationDays > 0) {
                                    $activatedAt = $get('activated_at') ?? now();
                                    $expiresAt = Carbon::parse($activatedAt)->addDays($durationDays);
                                    $set('expires_at', $expiresAt->format('Y-m-d H:i:s'));
                                }

                                $maxUsages = $template->default_max_usages
                                    ?? $template->scope?->default_max_usages;

                                if ($maxUsages) {
                                    $set('max_usages', $maxUsages);
                                }
                            })
                            ->helperText(__('laravel-licensing-filament-manager::license.help.template')),

                        LicenseablePicker::make('licensable')
                            ->label(__('laravel-licensing-filament-manager::license.fields.licensable')),

                        Forms\Components\Select::make('status')
                            ->label(__('laravel-licensing-filament-manager::license.fields.status'))
                            ->options(collect(LicenseStatus::cases())->mapWithKeys(
                                fn (LicenseStatus $status) => [$status->value => __("laravel-licensing-filament-manager::license.statuses.{$status->value}")]
                            ))
                            ->required()
                            ->default(LicenseStatus::Active->value),

                        Forms\Components\TextInput::make('max_usages')
                            ->label(__('laravel-licensing-filament-manager::license.fields.max_usages'))
                            ->numeric()
                            ->minValue(1)
                            ->default(1),
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
                                        $templateId = $get('template_id');

                                        if (! $templateId || ! $state) {
                                            return;
                                        }

                                        $template = config('licensing.models.license_template')::find($templateId);

                                        if (! $template) {
                                            return;
                                        }

                                        $template->loadMissing('scope');

                                        $durationDays = $template->license_duration_days
                                            ?? $template->scope?->default_duration_days;

                                        if (! $durationDays) {
                                            return;
                                        }

                                        $expiresAt = Carbon::parse($state)->addDays($durationDays);
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
                                    ->state(fn (?License $record) => $record?->loadCount('usages')->usages_count ?? 0),

                                TextEntry::make('remaining_usages')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.remaining_usages'))
                                    ->state(fn (?License $record) => $record ? max(0, $record->max_usages - ($record->usages_count ?? $record->loadCount('usages')->usages_count)) : 0),

                                TextEntry::make('usage_percentage')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.usage_percentage'))
                                    ->state(function (?License $record) {
                                        if (! $record || $record->max_usages === 0) {
                                            return '0%';
                                        }

                                        $usagesCount = $record->usages_count ?? $record->loadCount('usages')->usages_count;
                                        $percentage = ($usagesCount / $record->max_usages) * 100;

                                        return round($percentage, 1).'%';
                                    }),
                            ])
                            ->columns(3)
                            ->hiddenOn('create'),

                        Section::make(__('laravel-licensing-filament-manager::license.form.security'))
                            ->schema([
                                TextEntry::make('license_key_display')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.key_visibility'))
                                    ->state(function (?License $record) {
                                        if (! $record) {
                                            return null;
                                        }

                                        $retriever = app(EncryptedLicenseKeyRetriever::class);

                                        if (! $retriever->isAvailable()) {
                                            return __('laravel-licensing-filament-manager::license.security.key_not_retrievable');
                                        }

                                        $key = $retriever->retrieve($record);

                                        if (! $key) {
                                            return __('laravel-licensing-filament-manager::license.security.key_not_yet_generated');
                                        }

                                        return $key;
                                    })
                                    ->copyable()
                                    ->fontFamily('mono'),

                                TextEntry::make('key_hash_display')
                                    ->label(__('laravel-licensing-filament-manager::license.fields.key_hash'))
                                    ->state(fn (?License $record) => $record?->key_hash)
                                    ->fontFamily('mono'),
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
