<?php

return [
    'fields' => [
        'kid' => 'कुंजी आईडी',
        'status' => 'स्थिति',
        'algorithm' => 'एल्गोरिदम',
        'valid_from' => 'से वैध',
        'valid_until' => 'तक वैध',
        'revoked_at' => 'रद्द किया गया',
        'revocation_reason' => 'रद्दीकरण कारण',
    ],

    'actions' => [
        'generate_new' => 'नई कुंजी जेनेरेट करें',
        'generate_new_modal_heading' => 'नई साइनिंग कुंजी जेनेरेट करें',
        'generate_new_modal_description' => 'यह इस स्कोप के लिए एक नई साइनिंग कुंजी बनाएगा।',
        'revoke' => 'कुंजी रद्द करें',
        'revoke_modal_heading' => 'साइनिंग कुंजी रद्द करें',
        'revoke_modal_description' => 'यह इस साइनिंग कुंजी को स्थायी रूप से रद्द कर देगा। यह क्रिया पूर्ववत नहीं की जा सकती।',
        'revoke_selected' => 'चयनित कुंजी रद्द करें',
    ],

    'filters' => [
        'expired' => 'समाप्त कुंजी',
    ],

    'notifications' => [
        'generated' => 'साइनिंग कुंजी सफलतापूर्वक जेनेरेट की गई।',
        'generated_body' => 'नई साइनिंग कुंजी जारी की गई: :kid',
        'revoked' => 'साइनिंग कुंजी रद्द की गई।',
        'failed' => 'साइनिंग कुंजी जेनेरेट करने में असमर्थ।',
    ],
];
