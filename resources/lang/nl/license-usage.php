<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Gebruiksvingerafdruk',
        'status' => 'Status',
        'client_type' => 'Clienttype',
        'name' => 'Naam',
        'ip' => 'IP-adres',
        'user_agent' => 'User Agent',
        'registered_at' => 'Geregistreerd op',
        'last_seen_at' => 'Laatst gezien op',
        'revoked_at' => 'Ingetrokken op',
    ],

    'actions' => [
        'revoke' => 'Gebruik intrekken',
        'revoke_selected' => 'Selectie intrekken',
        'heartbeat' => 'Heartbeat bijwerken',
    ],

    'filters' => [
        'inactive' => 'Inactief (7+ dagen)',
    ],

    'help' => [
        'usage_fingerprint' => 'Doorgaans een hash van apparaat- of installatie-identificatoren.',
    ],

    'notifications' => [
        'revoked' => 'Gebruik succesvol ingetrokken.',
    ],
];
