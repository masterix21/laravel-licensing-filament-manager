<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Filament\Forms\Components;

use Filament\Forms\Components\MorphToSelect;
use Filament\Forms\Components\MorphToSelect\Type;

class LicenseablePicker extends MorphToSelect
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->types($this->getLicensableTypes());
        $this->searchable();
        $this->preload();
    }

    protected function getLicensableTypes(): array
    {
        $types = [];
        $licensedEntities = config('licensing-filament-manager.licensed_entities', []);

        foreach ($licensedEntities as $model => $config) {
            if (! class_exists($model)) {
                continue;
            }

            $titleAttribute = $config['title'] ?? 'name';
            $searchAttributes = $config['search'] ?? ['name'];

            $types[] = Type::make($model)
                ->titleAttribute($titleAttribute)
                ->getSearchResultsUsing(function (string $search) use ($model, $searchAttributes, $titleAttribute) {
                    $query = $model::query();

                    foreach ($searchAttributes as $index => $attribute) {
                        if ($index === 0) {
                            $query->where($attribute, 'like', "%{$search}%");
                        } else {
                            $query->orWhere($attribute, 'like', "%{$search}%");
                        }
                    }

                    return $query->limit(50)->pluck($titleAttribute, 'id');
                })
                ->getOptionLabelUsing(function ($value) use ($model, $titleAttribute): ?string {
                    $record = $model::find($value);

                    return $record?->{$titleAttribute};
                });
        }

        return $types;
    }
}
