<?php

return [
    'fields' => [
        'scope' => 'Zakres',
        'global' => 'Globalny',
        'name' => 'Nazwa szablonu',
        'slug' => 'Identyfikator URL',
        'tier_level' => 'Poziom warstwy',
        'parent_template' => 'Szablon nadrzędny',
        'is_active' => 'Aktywny',
        'supports_trial' => 'Obsługuje wersję próbną',
        'trial_duration_days' => 'Czas trwania wersji próbnej (Dni)',
        'has_grace_period' => 'Ma okres karencji',
        'grace_period_days' => 'Okres karencji (Dni)',
        'license_duration_days' => 'Czas trwania licencji (Dni)',
        'default_max_usages' => 'Domyślna Maks. Liczba Użyć',
        'days' => ':count dni',
        'base_configuration' => 'Konfiguracja podstawowa',
        'features' => 'Funkcje',
        'entitlements' => 'Uprawnienia',
        'meta' => 'Metadane',
        'licenses_count' => 'Licencje',
    ],

    'form' => [
        'details' => 'Szczegóły szablonu',
        'durations' => 'Okresy i Czasy Trwania',
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
        'license_duration_days' => 'Pozostaw puste dla licencji bezterminowych',
        'trial_duration_days' => 'Liczba dni okresu próbnego',
        'grace_period_days' => 'Liczba dni okresu karencji po wygaśnięciu',
        'base_configuration' => 'Pary klucz/wartość scalane z podstawową konfiguracją licencji (np. max_usages, validity_days, grace_days).',
        'features' => 'Flagi logiczne dla przełączników funkcji udostępnianych klientom.',
        'entitlements' => 'Uprawnienia numeryczne lub tekstowe (limity, pojemności itp.).',
        'default_max_usages' => 'Maksymalna liczba jednoczesnych użyć na licencję',
    ],
];
