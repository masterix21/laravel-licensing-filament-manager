<?php

return [
    'fields' => [
        'kid' => 'Anahtar ID',
        'status' => 'Durum',
        'algorithm' => 'Algoritma',
        'valid_from' => 'Gecerlilik Baslangici',
        'valid_until' => 'Gecerlilik Bitisi',
        'revoked_at' => 'Iptal Tarihi',
        'revocation_reason' => 'Iptal Nedeni',
    ],

    'actions' => [
        'generate_new' => 'Yeni Anahtar Olustur',
        'generate_new_modal_heading' => 'Yeni Imzalama Anahtari Olustur',
        'generate_new_modal_description' => 'Bu islem, bu kapsam icin yeni bir imzalama anahtari olusturacaktir.',
        'revoke' => 'Anahtari Iptal Et',
        'revoke_modal_heading' => 'Imzalama Anahtarini Iptal Et',
        'revoke_modal_description' => 'Bu islem, imzalama anahtarini kalici olarak iptal edecektir. Bu islem geri alinamaz.',
        'revoke_selected' => 'Secilen Anahtarlari Iptal Et',
    ],

    'filters' => [
        'expired' => 'Suresi Dolmus Anahtarlar',
    ],

    'notifications' => [
        'generated' => 'Imzalama anahtari basariyla olusturuldu.',
        'generated_body' => 'Yeni imzalama anahtari verildi: :kid',
        'revoked' => 'Imzalama anahtari iptal edildi.',
        'failed' => 'Imzalama anahtari olusturulamadi.',
    ],
];
