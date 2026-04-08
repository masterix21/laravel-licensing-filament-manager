<?php

return [
    'form' => [
        'basic_information' => 'Informasi Lisensi',
        'dates_activation' => 'Tanggal & Aktivasi',
        'usage_statistics' => 'Statistik Penggunaan',
        'metadata' => 'Metadata',
        'security' => 'Keamanan',
    ],

    'fields' => [
        'id' => 'ID Lisensi',
        'key_hash' => 'Hash Kunci Lisensi',
        'status' => 'Status',
        'license_scope' => 'Cakupan Lisensi',
        'licensable' => 'Entitas Berlisensi',
        'template' => 'Template Lisensi',
        'max_usages' => 'Maks Penggunaan',
        'usages' => 'Penggunaan',
        'remaining_usages' => 'Sisa Penggunaan',
        'usage_percentage' => 'Penggunaan %',
        'duration_days' => 'Durasi (Hari)',
        'activated_at' => 'Diaktifkan Pada',
        'expires_at' => 'Kedaluwarsa Pada',
        'meta' => 'Metadata',
        'key_visibility' => 'Pengambilan Kunci',
    ],

    'actions' => [
        'create' => 'Lisensi Baru',
        'activate' => 'Aktifkan',
        'suspend' => 'Tangguhkan',
        'renew' => 'Perpanjang',
        'show_key' => 'Tampilkan Kunci Lisensi',
        'regenerate_key' => 'Regenerasi Kunci Lisensi',
    ],

    'filters' => [
        'expired' => 'Kedaluwarsa',
        'expiring_soon' => 'Segera Kedaluwarsa',
        'over_limit' => 'Melebihi Batas Penggunaan',
    ],

    'help' => [
        'expires_at' => 'Biarkan kosong untuk perhitungan otomatis berdasarkan pengaturan template atau konfigurasi cakupan.',
        'template' => 'Template mengatur maks penggunaan, masa berlaku, fitur, dan hak akses.',
    ],

    'notifications' => [
        'created' => 'Lisensi berhasil dibuat.',
        'updated' => 'Lisensi berhasil diperbarui.',
        'activated' => 'Lisensi berhasil diaktifkan.',
        'suspended' => 'Lisensi berhasil ditangguhkan.',
        'renewed' => 'Lisensi berhasil diperpanjang.',
        'key_generated' => 'Kunci lisensi telah dibuat.',
        'key_retrieved' => 'Kunci lisensi siap.',
        'key_regenerated' => 'Kunci lisensi telah diregenerasi.',
        'key_unavailable' => 'Kunci lisensi tidak dapat diambil karena pengambilan dinonaktifkan.',
        'key_value' => 'Kunci lisensi: :key',
    ],

    'statuses' => [
        'pending' => 'Menunggu',
        'active' => 'Aktif',
        'grace' => 'Masa tenggang',
        'expired' => 'Kedaluwarsa',
        'suspended' => 'Ditangguhkan',
        'cancelled' => 'Dibatalkan',
    ],

    'relations' => [
        'usages' => 'Penggunaan',
        'renewals' => 'Perpanjangan',
        'transfers' => 'Transfer',
        'trials' => 'Uji Coba',
    ],

    'security' => [
        'key_not_yet_generated' => 'Kunci lisensi akan dibuat setelah disimpan.',
        'key_retrievable' => 'Pengambilan kunci terenkripsi diaktifkan.',
        'key_not_retrievable' => 'Pengambilan kunci dinonaktifkan dalam konfigurasi lisensi.',
        'key_not_stored' => 'Kunci tidak tersimpan untuk lisensi ini. Hanya tersedia untuk lisensi baru.',
    ],
];
