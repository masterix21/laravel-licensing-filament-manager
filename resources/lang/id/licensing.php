<?php

return [
    'navigation_group' => 'Manajemen Lisensi',

    'resources' => [
        'license' => [
            'navigation_label' => 'Lisensi',
            'model_label' => 'Lisensi',
            'plural_model_label' => 'Lisensi',
        ],
        'license_template' => [
            'navigation_label' => 'Template Lisensi',
            'model_label' => 'Template Lisensi',
            'plural_model_label' => 'Template Lisensi',
        ],
        'license_usage' => [
            'navigation_label' => 'Penggunaan Lisensi',
            'model_label' => 'Penggunaan Lisensi',
            'plural_model_label' => 'Penggunaan Lisensi',
        ],
        'license_scope' => [
            'navigation_label' => 'Lingkup Lisensi',
            'model_label' => 'Lingkup Lisensi',
            'plural_model_label' => 'Lingkup Lisensi',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Statistik Lisensi',
            'title' => 'Statistik Lisensi',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Total Lisensi',
            'total_licenses_description' => 'Semua lisensi dalam sistem',
            'active_licenses' => 'Lisensi Aktif',
            'active_licenses_description' => 'Lisensi yang sedang aktif',
            'total_usages' => 'Total Penggunaan',
            'total_usages_description' => 'Catatan penggunaan lisensi',
            'expiring_soon' => 'Segera Kedaluwarsa',
            'expiring_soon_description' => 'Lisensi aktif yang kedaluwarsa dalam 30 hari ke depan',
            'license_templates' => 'Template Lisensi',
            'license_templates_description' => 'Template lisensi aktif',
        ],
        'recent_usages' => [
            'heading' => 'Penggunaan Lisensi Terbaru',
        ],
        'expiring_licenses' => [
            'heading' => 'Lisensi yang Akan Kedaluwarsa',
            'empty_heading' => 'Tidak ada lisensi yang akan kedaluwarsa',
            'empty_description' => 'Tidak ada lisensi yang kedaluwarsa dalam 30 hari ke depan.',
        ],
    ],

    'fields' => [
        'license_key' => 'Kunci Lisensi',
        'key' => 'Kunci',
        'scope' => 'Cakupan',
        'scope_id' => 'Cakupan Lisensi',
        'template' => 'Template Lisensi',
        'licensable_type' => 'Tipe Berlisensi',
        'licensable_id' => 'ID Berlisensi',
        'expires_at' => 'Kedaluwarsa Pada',
        'is_active' => 'Aktif',
        'created_at' => 'Dibuat Pada',
        'updated_at' => 'Diperbarui Pada',
        'feature' => 'Fitur',
        'quantity' => 'Jumlah',
        'used_at' => 'Digunakan Pada',
        'days_remaining' => 'Sisa Hari',
        'device_id' => 'ID Perangkat',
        'device_name' => 'Nama Perangkat',
        'metadata' => 'Metadata',
        'activated_at' => 'Diaktifkan Pada',
        'deactivated_at' => 'Dinonaktifkan Pada',
    ],

    'actions' => [
        'create' => 'Buat',
        'edit' => 'Edit',
        'view' => 'Lihat',
        'delete' => 'Hapus',
        'deactivate' => 'Nonaktifkan',
    ],

    'filters' => [
        'active' => 'Aktif',
        'inactive' => 'Tidak Aktif',
        'deactivated' => 'Dinonaktifkan',
    ],
];
