<?php

return [
    'fields' => [
        'kid' => 'ID Kunci',
        'status' => 'Status',
        'algorithm' => 'Algoritma',
        'valid_from' => 'Berlaku Dari',
        'valid_until' => 'Berlaku Sampai',
        'revoked_at' => 'Dicabut Pada',
        'revocation_reason' => 'Alasan Pencabutan',
    ],

    'actions' => [
        'generate_new' => 'Buat Kunci Baru',
        'generate_new_modal_heading' => 'Buat Kunci Penandatangan Baru',
        'generate_new_modal_description' => 'Ini akan membuat kunci penandatangan baru untuk cakupan ini.',
        'revoke' => 'Cabut Kunci',
        'revoke_modal_heading' => 'Cabut Kunci Penandatangan',
        'revoke_modal_description' => 'Kunci penandatangan ini akan dicabut secara permanen. Tindakan ini tidak dapat dibatalkan.',
        'revoke_selected' => 'Cabut Kunci yang Dipilih',
    ],

    'filters' => [
        'expired' => 'Kunci Kedaluwarsa',
    ],

    'notifications' => [
        'generated' => 'Kunci penandatangan berhasil dibuat.',
        'generated_body' => 'Kunci penandatangan baru diterbitkan: :kid',
        'revoked' => 'Kunci penandatangan dicabut.',
        'failed' => 'Gagal membuat kunci penandatangan.',
    ],
];
