<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Kullanim Parmak Izi',
        'status' => 'Durum',
        'client_type' => 'Istemci Turu',
        'name' => 'Ad',
        'ip' => 'IP Adresi',
        'user_agent' => 'User Agent',
        'registered_at' => 'Kayit Tarihi',
        'last_seen_at' => 'Son Gorunme Tarihi',
        'revoked_at' => 'Iptal Tarihi',
    ],

    'actions' => [
        'revoke' => 'Kullanimi Iptal Et',
        'revoke_selected' => 'Secilenleri Iptal Et',
        'heartbeat' => 'Kalp Atisini Guncelle',
    ],

    'filters' => [
        'inactive' => 'Pasif (7+ gun)',
    ],

    'help' => [
        'usage_fingerprint' => 'Genellikle cihaz veya kurulum tanimlayicilarinin bir hash degeridir.',
    ],

    'notifications' => [
        'revoked' => 'Kullanim basariyla iptal edildi.',
    ],
];
