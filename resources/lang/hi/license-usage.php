<?php

return [
    'fields' => [
        'usage_fingerprint' => 'उपयोग फिंगरप्रिंट',
        'status' => 'स्थिति',
        'client_type' => 'क्लाइंट प्रकार',
        'name' => 'नाम',
        'ip' => 'IP पता',
        'user_agent' => 'यूजर एजेंट',
        'registered_at' => 'पंजीकृत किया गया',
        'last_seen_at' => 'अंतिम बार देखा गया',
        'revoked_at' => 'रद्द किया गया',
    ],

    'actions' => [
        'revoke' => 'उपयोग रद्द करें',
        'revoke_selected' => 'चयनित को रद्द करें',
        'heartbeat' => 'हार्टबीट अपडेट करें',
    ],

    'filters' => [
        'inactive' => 'निष्क्रिय (7+ दिन)',
    ],

    'help' => [
        'usage_fingerprint' => 'आम तौर पर डिवाइस या इंस्टॉलेशन पहचानकर्ताओं का हैश।',
    ],

    'notifications' => [
        'revoked' => 'उपयोग सफलतापूर्वक रद्द किया गया।',
    ],
];
