<?php

return [
    'form' => [
        'basic_information' => 'Informacje o licencji',
        'dates_activation' => 'Daty i aktywacja',
        'usage_statistics' => 'Statystyki użycia',
        'metadata' => 'Metadane',
        'security' => 'Bezpieczeństwo',
    ],

    'fields' => [
        'id' => 'ID licencji',
        'key_hash' => 'Hash klucza licencji',
        'status' => 'Status',
        'license_scope' => 'Zakres licencji',
        'licensable' => 'Podmiot licencjonowany',
        'template' => 'Szablon licencji',
        'max_usages' => 'Maksymalnie użyć',
        'usages' => 'Użycia',
        'remaining_usages' => 'Pozostałe użycia',
        'usage_percentage' => 'Użycie %',
        'duration_days' => 'Czas trwania (dni)',
        'activated_at' => 'Aktywowano',
        'expires_at' => 'Wygasa',
        'meta' => 'Metadane',
        'key_visibility' => 'Pobieranie klucza',
    ],

    'actions' => [
        'create' => 'Nowa licencja',
        'activate' => 'Aktywuj',
        'suspend' => 'Zawieś',
        'renew' => 'Odnów',
        'show_key' => 'Pokaż klucz licencji',
        'regenerate_key' => 'Regeneruj klucz licencji',
    ],

    'filters' => [
        'expired' => 'Wygasłe',
        'expiring_soon' => 'Wygasają wkrótce',
        'over_limit' => 'Przekroczony limit użycia',
    ],

    'help' => [
        'expires_at' => 'Pozostaw puste, aby automatycznie obliczyć na podstawie domyślnych ustawień szablonu lub konfiguracji zakresu.',
        'template' => 'Szablony kontrolują maksymalne użycia, ważność, funkcje i uprawnienia.',
    ],

    'notifications' => [
        'created' => 'Licencja została utworzona pomyślnie.',
        'updated' => 'Licencja została zaktualizowana pomyślnie.',
        'activated' => 'Licencja została aktywowana pomyślnie.',
        'suspended' => 'Licencja została zawieszona pomyślnie.',
        'renewed' => 'Licencja została odnowiona pomyślnie.',
        'key_generated' => 'Klucz licencji został wygenerowany.',
        'key_retrieved' => 'Klucz licencji jest gotowy.',
        'key_regenerated' => 'Klucz licencji został zregenerowany.',
        'key_unavailable' => 'Klucz licencji nie może zostać pobrany, ponieważ pobieranie jest wyłączone.',
        'key_value' => 'Klucz licencji: :key',
    ],

    'relations' => [
        'usages' => 'Użycia',
        'renewals' => 'Odnowienia',
        'transfers' => 'Transfery',
    ],

    'security' => [
        'key_not_yet_generated' => 'Klucz licencji zostanie wygenerowany po zapisaniu.',
        'key_retrievable' => 'Szyfrowane pobieranie klucza jest włączone.',
        'key_not_retrievable' => 'Pobieranie klucza jest wyłączone w konfiguracji licencjonowania.',
    ],
];
