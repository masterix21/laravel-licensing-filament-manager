<?php

return [
    'fields' => [
        'kid' => 'Key ID',
        'status' => 'Status',
        'algorithm' => 'Algorithm',
        'valid_from' => 'Valid From',
        'valid_until' => 'Valid Until',
        'revoked_at' => 'Revoked At',
        'revocation_reason' => 'Revocation Reason',
    ],

    'status' => [
        'active' => 'Active',
        'revoked' => 'Revoked',
        'compromised' => 'Compromised',
    ],

    'actions' => [
        'generate_new' => 'Generate New Key',
        'generate_new_modal_heading' => 'Generate New Signing Key',
        'generate_new_modal_description' => 'This will create a new signing key for this scope.',
        'revoke' => 'Revoke Key',
        'revoke_modal_heading' => 'Revoke Signing Key',
        'revoke_modal_description' => 'This will permanently revoke this signing key. This action cannot be undone.',
        'revoke_selected' => 'Revoke Selected Keys',
    ],

    'filters' => [
        'expired' => 'Expired Keys',
    ],
];
