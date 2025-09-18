<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Usage Fingerprint',
        'status' => 'Status',
        'client_type' => 'Client Type',
        'name' => 'Name',
        'ip' => 'IP Address',
        'user_agent' => 'User Agent',
        'registered_at' => 'Registered At',
        'last_seen_at' => 'Last Seen At',
        'revoked_at' => 'Revoked At',
    ],

    'actions' => [
        'revoke' => 'Revoke Usage',
        'revoke_selected' => 'Revoke Selected',
        'heartbeat' => 'Update Heartbeat',
    ],

    'filters' => [
        'inactive' => 'Inactive (7+ days)',
    ],

    'help' => [
        'usage_fingerprint' => 'Typically a hash of device or installation identifiers.',
    ],

    'notifications' => [
        'revoked' => 'Usage revoked successfully.',
    ],
];
