<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Impronta utilizzo',
        'status' => 'Stato',
        'client_type' => 'Tipo client',
        'name' => 'Nome',
        'ip' => 'Indirizzo IP',
        'user_agent' => 'User agent',
        'registered_at' => 'Registrato il',
        'last_seen_at' => 'Ultimo accesso',
        'revoked_at' => 'Revocato il',
    ],

    'actions' => [
        'revoke' => 'Revoca utilizzo',
        'revoke_selected' => 'Revoca selezionati',
        'heartbeat' => 'Aggiorna heartbeat',
    ],

    'filters' => [
        'inactive' => 'Inattivi (7+ giorni)',
    ],

    'status' => [
        'active' => 'Attivo',
        'revoked' => 'Revocato',
    ],

    'help' => [
        'usage_fingerprint' => 'In genere un hash di identificatori del dispositivo o dell’installazione.',
    ],

    'notifications' => [
        'revoked' => 'Utilizzo revocato con successo.',
    ],
];
