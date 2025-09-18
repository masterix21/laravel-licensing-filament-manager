<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseScopeResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Schemas\LicenseForm;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Tables\LicenseTable;

class LicensesRelationManager extends RelationManager
{
    protected static string $relationship = 'licenses';

    public function form(Schema $schema): Schema
    {
        return LicenseForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        return LicenseTable::configureForRelationManager($table, $this);
    }

    public static function getTitle($ownerRecord, $pageClass): string
    {
        return __('laravel-licensing-filament-manager::license-scope.relations.licenses');
    }
}
