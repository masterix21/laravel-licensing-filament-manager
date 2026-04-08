<?php

return [
    'fields' => [
        'kid' => 'Sleutel ID',
        'status' => 'Status',
        'algorithm' => 'Algoritme',
        'valid_from' => 'Geldig vanaf',
        'valid_until' => 'Geldig tot',
        'revoked_at' => 'Ingetrokken op',
        'revocation_reason' => 'Reden van intrekking',
    ],

    'actions' => [
        'generate_new' => 'Nieuwe sleutel genereren',
        'generate_new_modal_heading' => 'Nieuwe ondertekeningssleutel genereren',
        'generate_new_modal_description' => 'Hiermee wordt een nieuwe ondertekeningssleutel voor dit bereik aangemaakt.',
        'revoke' => 'Sleutel intrekken',
        'revoke_modal_heading' => 'Ondertekeningssleutel intrekken',
        'revoke_modal_description' => 'Hiermee wordt deze ondertekeningssleutel permanent ingetrokken. Deze actie kan niet ongedaan worden gemaakt.',
        'revoke_selected' => 'Geselecteerde sleutels intrekken',
    ],

    'filters' => [
        'expired' => 'Verlopen sleutels',
    ],

    'notifications' => [
        'generated' => 'Ondertekeningssleutel succesvol gegenereerd.',
        'generated_body' => 'Nieuwe ondertekeningssleutel uitgegeven: :kid',
        'revoked' => 'Ondertekeningssleutel ingetrokken.',
        'failed' => 'Kan ondertekeningssleutel niet genereren.',
    ],
];
