<?php

return [
    'fields' => [
        'scope' => 'Kapsam',
        'global' => 'Genel',
        'name' => 'Sablon Adi',
        'slug' => 'Slug',
        'tier_level' => 'Kademe Seviyesi',
        'parent_template' => 'Ust Sablon',
        'is_active' => 'Aktif',
        'supports_trial' => 'Deneme desteği var',
        'trial_duration_days' => 'Deneme Süresi (Gün)',
        'has_grace_period' => 'Ek süre var',
        'grace_period_days' => 'Ek Süre (Gün)',
        'license_duration_days' => 'Lisans Süresi (Gün)',
        'default_max_usages' => 'Varsayılan Maks. Kullanım',
        'days' => ':count gün',
        'base_configuration' => 'Temel Yapilandirma',
        'features' => 'Ozellikler',
        'entitlements' => 'Yetkilendirmeler',
        'meta' => 'Meta Veriler',
        'licenses_count' => 'Lisanslar',
    ],

    'form' => [
        'details' => 'Sablon Detaylari',
        'durations' => 'Süreler ve Dönemler',
        'configuration' => 'Yapilandirma ve Ozellikler',
        'metadata' => 'Meta Veriler',
    ],

    'actions' => [
        'create' => 'Yeni Sablon',
    ],

    'filters' => [
        'is_active' => 'Yalnizca aktif sablonlar',
    ],

    'help' => [
        'license_duration_days' => 'Süresiz lisanslar için boş bırakın',
        'trial_duration_days' => 'Deneme süresi gün sayısı',
        'grace_period_days' => 'Sona erdikten sonra ek süre gün sayısı',
        'base_configuration' => 'Lisans temel yapilandirmasina birlestirilen anahtar/deger ciftleri (ornegin max_usages, validity_days, grace_days).',
        'features' => 'Istemcilere sunulan ozellik acma/kapama bayraklari.',
        'entitlements' => 'Sayisal veya metin tabanli yetkilendirmeler (limitler, kapasiteler, vb.).',
        'default_max_usages' => 'Lisans başına maksimum eşzamanlı kullanım sayısı',
    ],
];
