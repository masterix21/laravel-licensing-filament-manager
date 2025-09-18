<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Pages;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Schemas\LicenseUsageForm;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseUsageResource\Tables\LicenseUsageTable;

class LicenseUsageResource extends Resource
{
    public static function getModel(): string
    {
        return config('licensing.models.license_usage');
    }

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-chart-bar-square';

    protected static ?int $navigationSort = 2;

    public static function getNavigationLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_usage.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_usage.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_usage.plural_model_label');
    }

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return LicenseUsageForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LicenseUsageTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLicenseUsages::route('/'),
            'create' => Pages\CreateLicenseUsage::route('/create'),
            'view' => Pages\ViewLicenseUsage::route('/{record}'),
            'edit' => Pages\EditLicenseUsage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }
}
