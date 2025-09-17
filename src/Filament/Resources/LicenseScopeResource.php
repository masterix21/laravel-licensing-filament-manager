<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Pages;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\RelationManagers;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Schemas\LicenseScopeForm;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\Tables\LicenseScopeTable;

class LicenseScopeResource extends Resource
{
    public static function getModel(): string
    {
        return config('licensing.models.license_scope');
    }

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-group';

    protected static ?int $navigationSort = 0;

    public static function getNavigationLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_scope.navigation_label');
    }

    public static function getModelLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_scope.model_label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license_scope.plural_model_label');
    }

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return LicenseScopeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LicenseScopeTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\LicensesRelationManager::class,
            RelationManagers\SigningKeysRelationManager::class,
            RelationManagers\TemplatesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLicenseScopes::route('/'),
            'create' => Pages\CreateLicenseScope::route('/create'),
            'view' => Pages\ViewLicenseScope::route('/{record}'),
            'edit' => Pages\EditLicenseScope::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::active()->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'info';
    }
}
