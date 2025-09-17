<?php

return [
    'fields' => [
        'kid' => 'ID chiave',
        'status' => 'Stato',
        'algorithm' => 'Algoritmo',
        'valid_from' => 'Valida dal',
        'valid_until' => 'Valida fino al',
        'revoked_at' => 'Revocata il',
        'revocation_reason' => 'Motivo della revoca',
    ],

    'status' => [
        'active' => 'Attiva',
        'revoked' => 'Revocata',
        'expired' => 'Scaduta',
    ],

    'actions' => [
        'generate_new' => 'Genera nuova chiave',
        'generate_new_modal_heading' => 'Genera nuova chiave di firma',
        'generate_new_modal_description' => 'Verrà creata una nuova chiave di firma per questo ambito.',
        'revoke' => 'Revoca chiave',
        'revoke_modal_heading' => 'Revoca chiave di firma',
        'revoke_modal_description' => 'La chiave sarà revocata in modo permanente. L’azione è irreversibile.',
        'revoke_selected' => 'Revoca chiavi selezionate',
    ],

    'filters' => [
        'expired' => 'Chiavi scadute',
    ],

    'notifications' => [
        'generated' => 'Chiave di firma generata con successo.',
        'generated_body' => 'Nuova chiave di firma emessa: :kid',
        'revoked' => 'Chiave di firma revocata.',
        'failed' => 'Impossibile generare la chiave di firma.',
    ],
];
