<?php

return [
    'fields' => [
        'name' => 'Nazwa szablonu',
        'slug' => 'Identyfikator URL',
        'tier_level' => 'Poziom warstwy',
        'parent_template' => 'Szablon nadrzędny',
        'is_active' => 'Aktywny',
        'license_duration_days' => 'Czas trwania',
        'supports_trial' => 'Okres próbny',
        'trial_duration_days' => 'Czas trwania okresu próbnego (dni)',
        'has_grace_period' => 'Okres karencji',
        'grace_period_days' => 'Okres karencji (dni)',
        'base_configuration' => 'Konfiguracja podstawowa',
        'features' => 'Funkcje',
        'entitlements' => 'Uprawnienia',
        'meta' => 'Metadane',
    ],

    'form' => [
        'details' => 'Szczegóły szablonu',
        'durations' => 'Czas trwania i okresy',
        'configuration' => 'Konfiguracja i funkcje',
        'metadata' => 'Metadane',
    ],

    'actions' => [
        'create' => 'Nowy szablon',
    ],

    'filters' => [
        'is_active' => 'Tylko aktywne szablony',
    ],

    'help' => [
        'base_configuration' => 'Pary klucz/wartość scalane z podstawową konfiguracją licencji (np. max_usages, validity_days).',
        'features' => 'Flagi logiczne dla przełączników funkcji udostępnianych klientom.',
        'entitlements' => 'Uprawnienia numeryczne lub tekstowe (limity, pojemności itp.).',
        'license_duration_days' => 'Liczba dni ważności licencji. Pozostaw puste dla nieograniczonego czasu.',
        'trial_duration_days' => 'Liczba dni okresu próbnego.',
        'grace_period_days' => 'Liczba dni po wygaśnięciu, zanim licencja zostanie całkowicie wyłączona.',
    ],

    'days' => ':count dni',
];
