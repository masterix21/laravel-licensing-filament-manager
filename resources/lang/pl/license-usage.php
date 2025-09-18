<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Odcisk użycia',
        'status' => 'Status',
        'client_type' => 'Typ klienta',
        'name' => 'Nazwa',
        'ip' => 'Adres IP',
        'user_agent' => 'User Agent',
        'registered_at' => 'Zarejestrowano',
        'last_seen_at' => 'Ostatnio widziano',
        'revoked_at' => 'Unieważniono',
    ],

    'actions' => [
        'revoke' => 'Unieważnij użycie',
        'revoke_selected' => 'Unieważnij zaznaczone',
        'heartbeat' => 'Aktualizuj heartbeat',
    ],

    'filters' => [
        'inactive' => 'Nieaktywne (7+ dni)',
    ],

    'help' => [
        'usage_fingerprint' => 'Zazwyczaj hash identyfikatorów urządzenia lub instalacji.',
    ],

    'notifications' => [
        'revoked' => 'Użycie zostało unieważnione pomyślnie.',
    ],
];
