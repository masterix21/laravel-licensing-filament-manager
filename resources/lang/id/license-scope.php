<?php

return [
    'form' => [
        'basic_information' => 'Informasi Dasar',
        'default_license_settings' => 'Pengaturan Lisensi Default',
        'default_license_settings_description' => 'Nilai default untuk lisensi yang dibuat dalam cakupan ini',
        'key_rotation_settings' => 'Pengaturan Rotasi Kunci',
        'key_rotation_settings_description' => 'Konfigurasi rotasi kunci penandatangan otomatis',
        'metadata' => 'Metadata',
    ],

    'fields' => [
        'name' => 'Nama',
        'slug' => 'Slug',
        'slug_help' => 'Pengidentifikasi ramah URL (hanya huruf kecil, angka, dan tanda hubung)',
        'identifier' => 'Pengidentifikasi',
        'identifier_help' => 'Pengidentifikasi unik untuk penggunaan API (misalnya com.company.product)',
        'description' => 'Deskripsi',
        'is_active' => 'Aktif',
        'default_max_usages' => 'Maks Penggunaan Default',
        'default_duration_days' => 'Durasi Default',
        'default_duration_days_help' => 'Biarkan kosong untuk lisensi permanen',
        'default_grace_days' => 'Masa Tenggang Default',
        'key_rotation_days' => 'Interval Rotasi Kunci',
        'key_rotation_days_help' => 'Atur ke 0 untuk menonaktifkan rotasi otomatis',
        'last_key_rotation_at' => 'Rotasi Kunci Terakhir',
        'next_key_rotation_at' => 'Rotasi Terjadwal Berikutnya',
        'licenses_count' => 'Total Lisensi',
        'active_licenses_count' => 'Lisensi Aktif',
        'meta' => 'Metadata Tambahan',
    ],

    'actions' => [
        'create' => 'Cakupan Lisensi Baru',
        'rotate_keys' => 'Rotasi Kunci',
        'rotate_keys_modal_heading' => 'Rotasi Kunci Penandatangan',
        'rotate_keys_modal_description' => 'Ini akan mencabut kunci aktif saat ini dan membuat kunci baru. Tindakan ini tidak dapat dibatalkan.',
        'manual_rotation' => 'Rotasi manual',
    ],

    'filters' => [
        'needs_rotation' => 'Perlu Rotasi Kunci',
        'has_licenses' => 'Memiliki Lisensi',
    ],

    'notifications' => [
        'created' => 'Cakupan Lisensi berhasil dibuat.',
        'updated' => 'Cakupan Lisensi berhasil diperbarui.',
    ],

    'relations' => [
        'licenses' => 'Lisensi',
        'signing_keys' => 'Kunci Penandatangan',
    ],

    'perpetual' => 'Permanen',
    'unlimited' => 'Tidak terbatas',
    'seats' => 'kursi',
    'days' => 'hari',
    'none' => 'Tidak ada',
    'rotation_days' => ':days hari',
    'disabled' => 'Dinonaktifkan',
];
