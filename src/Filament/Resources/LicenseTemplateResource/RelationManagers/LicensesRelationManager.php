<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseTemplateResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Schemas\LicenseForm;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Resources\LicenseResource\Tables\LicenseTable;

class LicensesRelationManager extends RelationManager
{
    protected static string $relationship = 'licenses';

    protected static bool $shouldResolveRelationship = false;

    public function form(Schema $schema): Schema
    {
        return LicenseForm::configure($schema);
    }

    public function table(Table $table): Table
    {
        $licenseModel = config('licensing.models.license');
        $templateId = $this->getOwnerRecord()->getKey();

        return LicenseTable::configureForRelationManager(
            $table->query($licenseModel::query()->where('template_id', $templateId))
        );
    }

    public static function getTitle($ownerRecord, $pageClass): string
    {
        return __('laravel-licensing-filament-manager::licensing.resources.license.plural_model_label');
    }
}
