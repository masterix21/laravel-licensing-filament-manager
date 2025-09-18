<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\RelationManagers;

use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use LucaLongo\Licensing\Models\LicenseScope;
use LucaLongo\Licensing\Models\LicenseTemplate;

class TemplatesRelationManager extends RelationManager
{
    protected static string $relationship = 'templates';

    public function form(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->schema([
                Section::make(__('laravel-licensing-filament-manager::license-template.form.details'))
                    ->columns(4)
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.name'))
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('slug')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.slug'))
                            ->disabled()
                            ->dehydrated(false)
                            ->visible(fn (?LicenseTemplate $record) => (bool) $record?->slug)
                            ->columnSpan(2),

                        Forms\Components\TextInput::make('tier_level')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.tier_level'))
                            ->numeric()
                            ->minValue(1)
                            ->required()
                            ->columnSpan(2),

                        Forms\Components\Toggle::make('is_active')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.is_active'))
                            ->default(true)
                            ->columnSpan(2),
                    ]),

                Section::make(__('laravel-licensing-filament-manager::license-template.form.configuration'))
                    ->schema([
                        Forms\Components\KeyValue::make('base_configuration')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.base_configuration'))
                            ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                            ->valueLabel(__('laravel-licensing-filament-manager::common.value'))
                            ->helperText(__('laravel-licensing-filament-manager::license-template.help.base_configuration'))
                            ->formatStateUsing(fn ($state) => $this->formatArrayState($state))
                            ->dehydrateStateUsing(fn ($state) => $this->sanitizeArrayValue($state)),

                        Forms\Components\KeyValue::make('features')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.features'))
                            ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                            ->valueLabel(__('laravel-licensing-filament-manager::common.value'))
                            ->helperText(__('laravel-licensing-filament-manager::license-template.help.features'))
                            ->formatStateUsing(fn ($state) => $this->formatArrayState($state))
                            ->dehydrateStateUsing(fn ($state) => $this->sanitizeArrayValue($state)),

                        Forms\Components\KeyValue::make('entitlements')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.entitlements'))
                            ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                            ->valueLabel(__('laravel-licensing-filament-manager::common.value'))
                            ->helperText(__('laravel-licensing-filament-manager::license-template.help.entitlements'))
                            ->formatStateUsing(fn ($state) => $this->formatArrayState($state))
                            ->dehydrateStateUsing(fn ($state) => $this->sanitizeArrayValue($state)),
                    ])
                    ->columns(1),

                Section::make(__('laravel-licensing-filament-manager::license-template.form.metadata'))
                    ->schema([
                        Forms\Components\KeyValue::make('meta')
                            ->label(__('laravel-licensing-filament-manager::license-template.fields.meta'))
                            ->keyLabel(__('laravel-licensing-filament-manager::common.key'))
                            ->valueLabel(__('laravel-licensing-filament-manager::common.value'))
                            ->nullable()
                            ->formatStateUsing(fn ($state) => $this->formatArrayState($state))
                            ->dehydrateStateUsing(fn ($state) => $this->sanitizeArrayValue($state)),
                    ])
                    ->collapsible()
                    ->collapsed(),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.name'))
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('tier_level')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.tier_level'))
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label(__('laravel-licensing-filament-manager::license-template.fields.is_active'))
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__('laravel-licensing-filament-manager::common.created_at'))
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label(__('laravel-licensing-filament-manager::license-template.filters.is_active')),
            ])
            ->headerActions([
                CreateAction::make()
                    ->label(__('laravel-licensing-filament-manager::license-template.actions.create'))
                    ->using(function (array $data, RelationManager $livewire): LicenseTemplate {
                        /** @var LicenseScope $scope */
                        $scope = $livewire->getOwnerRecord();

                        $preparedData = [
                            ...$livewire->prepareTemplatePayload($data),
                            'license_scope_id' => $scope->getKey(),
                        ];

                        return LicenseTemplate::create($preparedData);
                    }),
            ])
            ->recordActions([
                ViewAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.view')),
                EditAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.edit'))
                    ->mutateFormDataUsing(fn (array $data) => $this->prepareTemplatePayload($data)),
                DeleteAction::make()
                    ->label(__('laravel-licensing-filament-manager::common.actions.delete')),
            ])
            ->defaultSort('tier_level');
    }

    protected function prepareTemplatePayload(array $data): array
    {
        foreach (['base_configuration', 'features', 'entitlements', 'meta'] as $key) {
            $data[$key] = $this->sanitizeArrayValue($data[$key] ?? []);
        }

        return $data;
    }

    protected function formatArrayState(mixed $state): array
    {
        if ($state instanceof \ArrayObject) {
            return $state->getArrayCopy();
        }

        if ($state instanceof \Illuminate\Support\Collection) {
            return $state->toArray();
        }

        return is_array($state) ? $state : [];
    }

    protected function sanitizeArrayValue(mixed $value): array
    {
        if ($value instanceof \ArrayObject) {
            return $value->getArrayCopy();
        }

        if ($value instanceof \Illuminate\Support\Collection) {
            return $value->toArray();
        }

        return is_array($value) ? $value : [];
    }
}
