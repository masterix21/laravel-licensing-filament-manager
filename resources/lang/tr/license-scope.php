<?php

return [
    'form' => [
        'basic_information' => 'Temel Bilgiler',
        'default_license_settings' => 'Varsayilan Lisans Ayarlari',
        'default_license_settings_description' => 'Bu kapsam icinde olusturulan lisanslar icin varsayilan degerler',
        'key_rotation_settings' => 'Anahtar Rotasyon Ayarlari',
        'key_rotation_settings_description' => 'Otomatik imzalama anahtari rotasyon yapilandirmasi',
        'metadata' => 'Meta Veriler',
    ],

    'fields' => [
        'name' => 'Ad',
        'slug' => 'Slug',
        'slug_help' => 'URL dostu tanimlayici (yalnizca kucuk harfler, rakamlar ve tireler)',
        'identifier' => 'Tanimlayici',
        'identifier_help' => 'API kullanimi icin benzersiz tanimlayici (ornegin com.sirket.urun)',
        'description' => 'Aciklama',
        'is_active' => 'Aktif',
        'default_max_usages' => 'Varsayilan Maksimum Kullanim',
        'default_duration_days' => 'Varsayilan Sure',
        'default_duration_days_help' => 'Suresiz lisanslar icin bos birakin',
        'default_grace_days' => 'Varsayilan Ek Sure',
        'key_rotation_days' => 'Anahtar Rotasyon Araligi',
        'key_rotation_days_help' => 'Otomatik rotasyonu devre disi birakmak icin 0 olarak ayarlayin',
        'last_key_rotation_at' => 'Son Anahtar Rotasyonu',
        'next_key_rotation_at' => 'Sonraki Planlanmis Rotasyon',
        'licenses_count' => 'Toplam Lisans',
        'active_licenses_count' => 'Aktif Lisanslar',
        'meta' => 'Ek Meta Veriler',
    ],

    'actions' => [
        'create' => 'Yeni Lisans Kapsami',
        'rotate_keys' => 'Anahtarlari Dondur',
        'rotate_keys_modal_heading' => 'Imzalama Anahtarlarini Dondur',
        'rotate_keys_modal_description' => 'Bu islem mevcut aktif anahtarlari iptal edecek ve yenilerini olusturacaktir. Bu islem geri alinamaz.',
        'manual_rotation' => 'Manuel rotasyon',
    ],

    'filters' => [
        'needs_rotation' => 'Anahtar Rotasyonu Gerekli',
        'has_licenses' => 'Lisanslari Var',
    ],

    'notifications' => [
        'created' => 'Lisans kapsami basariyla olusturuldu.',
        'updated' => 'Lisans kapsami basariyla guncellendi.',
    ],

    'relations' => [
        'licenses' => 'Lisanslar',
        'signing_keys' => 'Imzalama Anahtarlari',
    ],

    'perpetual' => 'Suresiz',
    'unlimited' => 'Sınırsız',
    'seats' => 'koltuk',
    'days' => 'gün',
    'none' => 'Yok',
    'rotation_days' => ':days gun',
    'disabled' => 'Devre disi',
];
