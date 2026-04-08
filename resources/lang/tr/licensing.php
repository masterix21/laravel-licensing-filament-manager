<?php

return [
    'navigation_group' => 'Lisans Yonetimi',

    'resources' => [
        'license' => [
            'navigation_label' => 'Lisanslar',
            'model_label' => 'Lisans',
            'plural_model_label' => 'Lisanslar',
        ],
        'license_template' => [
            'navigation_label' => 'Lisans Sablonlari',
            'model_label' => 'Lisans Sablonu',
            'plural_model_label' => 'Lisans Sablonlari',
        ],
        'license_usage' => [
            'navigation_label' => 'Lisans Kullanimlari',
            'model_label' => 'Lisans Kullanimi',
            'plural_model_label' => 'Lisans Kullanimlari',
        ],
        'license_scope' => [
            'navigation_label' => 'Lisans Kapsamları',
            'model_label' => 'Lisans Kapsamı',
            'plural_model_label' => 'Lisans Kapsamları',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Lisans Istatistikleri',
            'title' => 'Lisans Istatistikleri',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Toplam Lisans',
            'total_licenses_description' => 'Sistemdeki tum lisanslar',
            'active_licenses' => 'Aktif Lisanslar',
            'active_licenses_description' => 'Su anda aktif olan lisanslar',
            'total_usages' => 'Toplam Kullanim',
            'total_usages_description' => 'Lisans kullanim kayitlari',
            'expiring_soon' => 'Suresi Yaklasan',
            'expiring_soon_description' => 'Onumuzdeki 30 gun icinde suresi dolacak aktif lisanslar',
            'license_templates' => 'Lisans Sablonlari',
            'license_templates_description' => 'Aktif lisans sablonlari',
        ],
        'recent_usages' => [
            'heading' => 'Son Lisans Kullanimlari',
        ],
        'expiring_licenses' => [
            'heading' => 'Suresi Dolan Lisanslar',
            'empty_heading' => 'Suresi dolan lisans yok',
            'empty_description' => 'Onumuzdeki 30 gun icinde suresi dolacak lisans bulunmamaktadir.',
        ],
    ],

    'fields' => [
        'license_key' => 'Lisans Anahtari',
        'key' => 'Anahtar',
        'scope' => 'Kapsam',
        'scope_id' => 'Lisans Kapsami',
        'template' => 'Lisans Sablonu',
        'licensable_type' => 'Lisanslanabilir Tur',
        'licensable_id' => 'Lisanslanabilir ID',
        'expires_at' => 'Son Kullanma Tarihi',
        'is_active' => 'Aktif',
        'created_at' => 'Olusturulma Tarihi',
        'updated_at' => 'Guncellenme Tarihi',
        'feature' => 'Ozellik',
        'quantity' => 'Miktar',
        'used_at' => 'Kullanilma Tarihi',
        'days_remaining' => 'Kalan Gun',
        'device_id' => 'Cihaz ID',
        'device_name' => 'Cihaz Adi',
        'metadata' => 'Meta Veriler',
        'activated_at' => 'Etkinlestirme Tarihi',
        'deactivated_at' => 'Devre Disi Birakma Tarihi',
    ],

    'actions' => [
        'create' => 'Olustur',
        'edit' => 'Duzenle',
        'view' => 'Goruntule',
        'delete' => 'Sil',
        'deactivate' => 'Devre Disi Birak',
    ],

    'filters' => [
        'active' => 'Aktif',
        'inactive' => 'Pasif',
        'deactivated' => 'Devre Disi',
    ],
];
