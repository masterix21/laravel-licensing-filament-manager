<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Sidik Jari Penggunaan',
        'status' => 'Status',
        'client_type' => 'Tipe Klien',
        'name' => 'Nama',
        'ip' => 'Alamat IP',
        'user_agent' => 'User Agent',
        'registered_at' => 'Didaftarkan Pada',
        'last_seen_at' => 'Terakhir Terlihat',
        'revoked_at' => 'Dicabut Pada',
    ],

    'actions' => [
        'revoke' => 'Cabut Penggunaan',
        'revoke_selected' => 'Cabut yang Dipilih',
        'heartbeat' => 'Perbarui Heartbeat',
    ],

    'filters' => [
        'inactive' => 'Tidak Aktif (7+ hari)',
    ],

    'help' => [
        'usage_fingerprint' => 'Biasanya berupa hash dari pengidentifikasi perangkat atau instalasi.',
    ],

    'notifications' => [
        'revoked' => 'Penggunaan berhasil dicabut.',
    ],
];
