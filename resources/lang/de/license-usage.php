<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Nutzungsfingerabdruck',
        'status' => 'Status',
        'client_type' => 'Client-Typ',
        'name' => 'Name',
        'ip' => 'IP-Adresse',
        'user_agent' => 'User Agent',
        'registered_at' => 'Registriert am',
        'last_seen_at' => 'Zuletzt gesehen am',
        'revoked_at' => 'Widerrufen am',
    ],

    'actions' => [
        'revoke' => 'Nutzung widerrufen',
        'revoke_selected' => 'Ausgewählte widerrufen',
        'heartbeat' => 'Heartbeat aktualisieren',
    ],

    'filters' => [
        'inactive' => 'Inaktiv (7+ Tage)',
    ],

    'help' => [
        'usage_fingerprint' => 'Normalerweise ein Hash von Geräte- oder Installationskennungen.',
    ],

    'notifications' => [
        'revoked' => 'Nutzung erfolgreich widerrufen.',
    ],
];