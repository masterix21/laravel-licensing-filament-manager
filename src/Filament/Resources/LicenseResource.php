<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources;

use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Pages;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\RelationManagers;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Schemas\LicenseForm;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Tables\LicenseTable;
use LucaLongo\Licensing\Enums\LicenseStatus;
use LucaLongo\Licensing\Models\License;

class LicenseResource extends Resource
{
    protected static ?string $model = License::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-key';

    protected static ?string $navigationLabel = 'Licenses';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'id';

    public static function form(Schema $schema): Schema
    {
        return LicenseForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return LicenseTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\UsagesRelationManager::class,
            RelationManagers\RenewalsRelationManager::class,
            RelationManagers\TransfersRelationManager::class,
            RelationManagers\TrialsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLicenses::route('/'),
            'create' => Pages\CreateLicense::route('/create'),
            'view' => Pages\ViewLicense::route('/{record}'),
            'edit' => Pages\EditLicense::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', LicenseStatus::Active)->count();
    }

    public static function getNavigationBadgeColor(): string|array|null
    {
        return 'success';
    }
}
