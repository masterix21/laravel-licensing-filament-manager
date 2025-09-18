<?php

return [
    'form' => [
        'basic_information' => 'Informacje podstawowe',
        'default_license_settings' => 'Domyślne ustawienia licencji',
        'default_license_settings_description' => 'Domyślne wartości dla licencji utworzonych w tym zakresie',
        'key_rotation_settings' => 'Ustawienia rotacji kluczy',
        'key_rotation_settings_description' => 'Konfiguracja automatycznej rotacji kluczy podpisywania',
        'metadata' => 'Metadane',
    ],

    'fields' => [
        'name' => 'Nazwa',
        'slug' => 'Identyfikator URL',
        'slug_help' => 'Identyfikator przyjazny URL (tylko małe litery, cyfry i myślniki)',
        'identifier' => 'Identyfikator',
        'identifier_help' => 'Unikalny identyfikator do użytku API (np. com.firma.produkt)',
        'description' => 'Opis',
        'is_active' => 'Aktywny',
        'default_max_usages' => 'Domyślna maksymalna liczba użyć',
        'default_duration_days' => 'Domyślny czas trwania (dni)',
        'default_duration_days_help' => 'Pozostaw puste dla licencji bezterminowych',
        'default_grace_days' => 'Domyślny okres karencji (dni)',
        'key_rotation_days' => 'Interwał rotacji kluczy (dni)',
        'key_rotation_days_help' => 'Ustaw na 0, aby wyłączyć automatyczną rotację',
        'last_key_rotation_at' => 'Ostatnia rotacja kluczy',
        'next_key_rotation_at' => 'Następna zaplanowana rotacja',
        'licenses_count' => 'Łączna liczba licencji',
        'active_licenses_count' => 'Aktywne licencje',
        'meta' => 'Dodatkowe metadane',
    ],

    'actions' => [
        'create' => 'Nowy zakres licencji',
        'rotate_keys' => 'Rotacja kluczy',
        'rotate_keys_modal_heading' => 'Rotacja kluczy podpisywania',
        'rotate_keys_modal_description' => 'To spowoduje unieważnienie aktualnych aktywnych kluczy i wygenerowanie nowych. Ta akcja nie może zostać cofnięta.',
        'manual_rotation' => 'Rotacja ręczna',
    ],

    'filters' => [
        'needs_rotation' => 'Wymaga rotacji kluczy',
        'has_licenses' => 'Ma licencje',
    ],

    'notifications' => [
        'created' => 'Zakres licencji został utworzony pomyślnie.',
        'updated' => 'Zakres licencji został zaktualizowany pomyślnie.',
    ],

    'relations' => [
        'licenses' => 'Licencje',
        'signing_keys' => 'Klucze podpisywania',
    ],

    'perpetual' => 'Bezterminowa',
    'rotation_days' => ':days dni',
    'disabled' => 'Wyłączona',
];
