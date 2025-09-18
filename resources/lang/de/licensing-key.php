<?php

return [
    'fields' => [
        'kid' => 'Schlüssel-ID',
        'status' => 'Status',
        'algorithm' => 'Algorithmus',
        'valid_from' => 'Gültig ab',
        'valid_until' => 'Gültig bis',
        'revoked_at' => 'Widerrufen am',
        'revocation_reason' => 'Widerrufsgrund',
    ],

    'actions' => [
        'generate_new' => 'Neuen Schlüssel generieren',
        'generate_new_modal_heading' => 'Neuen Signaturschlüssel generieren',
        'generate_new_modal_description' => 'Dies erstellt einen neuen Signaturschlüssel für diesen Bereich.',
        'revoke' => 'Schlüssel widerrufen',
        'revoke_modal_heading' => 'Signaturschlüssel widerrufen',
        'revoke_modal_description' => 'Dies widerruft diesen Signaturschlüssel dauerhaft. Diese Aktion kann nicht rückgängig gemacht werden.',
        'revoke_selected' => 'Ausgewählte Schlüssel widerrufen',
    ],

    'filters' => [
        'expired' => 'Abgelaufene Schlüssel',
    ],

    'notifications' => [
        'generated' => 'Signaturschlüssel erfolgreich generiert.',
        'generated_body' => 'Neuer Signaturschlüssel ausgestellt: :kid',
        'revoked' => 'Signaturschlüssel widerrufen.',
        'failed' => 'Signaturschlüssel konnte nicht generiert werden.',
    ],
];
