<?php

return [
    'fields' => [
        'scope' => 'Lingkup',
        'global' => 'Global',
        'name' => 'Nama Template',
        'slug' => 'Slug',
        'tier_level' => 'Tingkat Paket',
        'parent_template' => 'Template Induk',
        'is_active' => 'Aktif',
        'supports_trial' => 'Mendukung uji coba',
        'trial_duration_days' => 'Durasi Uji Coba (Hari)',
        'has_grace_period' => 'Memiliki masa tenggang',
        'grace_period_days' => 'Masa Tenggang (Hari)',
        'license_duration_days' => 'Durasi Lisensi (Hari)',
        'default_max_usages' => 'Maks. Penggunaan Default',
        'days' => ':count hari',
        'base_configuration' => 'Konfigurasi Dasar',
        'features' => 'Fitur',
        'entitlements' => 'Hak Akses',
        'meta' => 'Metadata',
        'licenses_count' => 'Lisensi',
    ],

    'form' => [
        'details' => 'Detail Template',
        'durations' => 'Durasi & Periode',
        'configuration' => 'Konfigurasi & Fitur',
        'metadata' => 'Metadata',
    ],

    'actions' => [
        'create' => 'Template Baru',
    ],

    'filters' => [
        'is_active' => 'Hanya template aktif',
    ],

    'help' => [
        'license_duration_days' => 'Kosongkan untuk lisensi perpetual',
        'trial_duration_days' => 'Jumlah hari untuk masa uji coba',
        'grace_period_days' => 'Jumlah hari untuk masa tenggang setelah kedaluwarsa',
        'base_configuration' => 'Pasangan kunci/nilai yang digabungkan ke konfigurasi dasar lisensi (misalnya max_usages, validity_days, grace_days).',
        'features' => 'Flag boolean untuk mengaktifkan/menonaktifkan fitur yang tersedia bagi klien.',
        'entitlements' => 'Hak akses berupa angka atau teks (batas, kapasitas, dll.).',
        'default_max_usages' => 'Jumlah maksimum penggunaan bersamaan per lisensi',
    ],
];
