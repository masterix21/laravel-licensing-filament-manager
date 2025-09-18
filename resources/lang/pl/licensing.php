<?php

return [
    'navigation_group' => 'Zarządzanie licencjami',

    'resources' => [
        'license' => [
            'navigation_label' => 'Licencje',
            'model_label' => 'Licencja',
            'plural_model_label' => 'Licencje',
        ],
        'license_scope' => [
            'navigation_label' => 'Zakresy licencji',
            'model_label' => 'Zakres licencji',
            'plural_model_label' => 'Zakresy licencji',
        ],
        'license_usage' => [
            'navigation_label' => 'Użycia licencji',
            'model_label' => 'Użycie licencji',
            'plural_model_label' => 'Użycia licencji',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Statystyki licencjonowania',
            'title' => 'Statystyki licencjonowania',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Łączna liczba licencji',
            'total_licenses_description' => 'Wszystkie licencje w systemie',
            'active_licenses' => 'Aktywne licencje',
            'active_licenses_description' => 'Obecnie aktywne licencje',
            'total_usages' => 'Łączne użycia',
            'total_usages_description' => 'Rekordy użycia licencji',
            'expiring_soon' => 'Wygasające wkrótce',
            'expiring_soon_description' => 'Aktywne licencje wygasające w ciągu 30 dni',
            'license_scopes' => 'Zakresy licencji',
            'license_scopes_description' => 'Dostępne typy licencji',
        ],
        'recent_usages' => [
            'heading' => 'Ostatnie użycia licencji',
        ],
        'expiring_licenses' => [
            'heading' => 'Wygasające licencje',
            'empty_heading' => 'Brak wygasających licencji',
            'empty_description' => 'Nie ma licencji wygasających w ciągu 30 dni.',
        ],
    ],

    'fields' => [
        'license_key' => 'Klucz licencji',
        'key' => 'Klucz',
        'scope' => 'Zakres',
        'scope_id' => 'Zakres licencji',
        'template' => 'Szablon licencji',
        'licensable_type' => 'Typ licencjonowany',
        'licensable_id' => 'ID licencjonowanego',
        'expires_at' => 'Wygasa',
        'is_active' => 'Jest aktywna',
        'created_at' => 'Utworzono',
        'updated_at' => 'Zaktualizowano',
        'feature' => 'Funkcja',
        'quantity' => 'Ilość',
        'used_at' => 'Użyto',
        'days_remaining' => 'Pozostało dni',
        'device_id' => 'ID urządzenia',
        'device_name' => 'Nazwa urządzenia',
        'metadata' => 'Metadane',
        'activated_at' => 'Aktywowano',
        'deactivated_at' => 'Dezaktywowano',
    ],

    'actions' => [
        'create' => 'Utwórz',
        'edit' => 'Edytuj',
        'view' => 'Wyświetl',
        'delete' => 'Usuń',
        'deactivate' => 'Dezaktywuj',
    ],

    'filters' => [
        'active' => 'Aktywne',
        'inactive' => 'Nieaktywne',
        'deactivated' => 'Dezaktywowane',
    ],
];
