<?php

return [
    'form' => [
        'basic_information' => 'Lisans Bilgileri',
        'dates_activation' => 'Tarihler ve Etkinlestirme',
        'usage_statistics' => 'Kullanim Istatistikleri',
        'metadata' => 'Meta Veriler',
        'security' => 'Guvenlik',
    ],

    'fields' => [
        'id' => 'Lisans ID',
        'key_hash' => 'Lisans Anahtari Hash',
        'status' => 'Durum',
        'license_scope' => 'Lisans Kapsami',
        'licensable' => 'Lisansli Varlik',
        'template' => 'Lisans Sablonu',
        'max_usages' => 'Maksimum Kullanim',
        'usages' => 'Kullanimlar',
        'remaining_usages' => 'Kalan Kullanim',
        'usage_percentage' => 'Kullanim %',
        'duration_days' => 'Sure (Gun)',
        'activated_at' => 'Etkinlestirme Tarihi',
        'expires_at' => 'Son Kullanma Tarihi',
        'meta' => 'Meta Veriler',
        'key_visibility' => 'Anahtar Erisimi',
    ],

    'actions' => [
        'create' => 'Yeni Lisans',
        'activate' => 'Etkinlestir',
        'suspend' => 'Askiya Al',
        'renew' => 'Yenile',
        'show_key' => 'Lisans Anahtarini Goster',
        'regenerate_key' => 'Lisans Anahtarini Yeniden Olustur',
    ],

    'filters' => [
        'expired' => 'Suresi Dolmus',
        'expiring_soon' => 'Suresi Yaklasan',
        'over_limit' => 'Kullanim Limiti Asildi',
    ],

    'help' => [
        'expires_at' => 'Sablon varsayilanlarina veya kapsam yapilandirmasina gore otomatik hesaplamak icin bos birakin.',
        'template' => 'Sablonlar maksimum kullanim, gecerlilik, ozellikler ve yetkilendirmeleri kontrol eder.',
    ],

    'notifications' => [
        'created' => 'Lisans basariyla olusturuldu.',
        'updated' => 'Lisans basariyla guncellendi.',
        'activated' => 'Lisans basariyla etkinlestirildi.',
        'suspended' => 'Lisans basariyla askiya alindi.',
        'renewed' => 'Lisans basariyla yenilendi.',
        'key_generated' => 'Lisans anahtari olusturuldu.',
        'key_retrieved' => 'Lisans anahtari hazir.',
        'key_regenerated' => 'Lisans anahtari yeniden olusturuldu.',
        'key_unavailable' => 'Lisans anahtari alinamadi cunku erisim devre disi birakildi.',
        'key_value' => 'Lisans anahtari: :key',
    ],

    'statuses' => [
        'pending' => 'Beklemede',
        'active' => 'Aktif',
        'grace' => 'Ek süre',
        'expired' => 'Süresi dolmuş',
        'suspended' => 'Askıya alınmış',
        'cancelled' => 'İptal edilmiş',
    ],

    'relations' => [
        'usages' => 'Kullanimlar',
        'renewals' => 'Yenilemeler',
        'transfers' => 'Transferler',
        'trials' => 'Deneme Sürümleri',
    ],

    'security' => [
        'key_not_yet_generated' => 'Lisans anahtari kaydetme isleminden sonra olusturulacaktir.',
        'key_retrievable' => 'Sifreli anahtar erisimi etkinlestirildi.',
        'key_not_retrievable' => 'Anahtar erisimi lisans yapilandirmasinda devre disi birakildi.',
    ],
];
