<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Pages;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\RelationManagers;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Schemas\LicenseTemplateForm;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\Tables\LicenseTemplateTable;

class LicenseTemplateResource extends Resource
{
    public static function getModel(): string
    {
        return config('licensing.models.license_template');
    }

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?int $navigationSort = 0;

    public static function getNavigationLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_template.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_template.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_template.plural_model_label');
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return LicenseTemplateForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LicenseTemplateTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\LicensesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLicenseTemplates::route('/'),
            'create' => Pages\CreateLicenseTemplate::route('/create'),
            'view' => Pages\ViewLicenseTemplate::route('/{record}'),
            'edit' => Pages\EditLicenseTemplate::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::query()->where('is_active', true)->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }
}
