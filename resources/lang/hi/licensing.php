<?php

return [
    'navigation_group' => 'लाइसेंस प्रबंधन',

    'resources' => [
        'license' => [
            'navigation_label' => 'लाइसेंस',
            'model_label' => 'लाइसेंस',
            'plural_model_label' => 'लाइसेंस',
        ],
        'license_scope' => [
            'navigation_label' => 'लाइसेंस स्कोप',
            'model_label' => 'लाइसेंस स्कोप',
            'plural_model_label' => 'लाइसेंस स्कोप',
        ],
        'license_usage' => [
            'navigation_label' => 'लाइसेंस उपयोग',
            'model_label' => 'लाइसेंस उपयोग',
            'plural_model_label' => 'लाइसेंस उपयोग',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'लाइसेंसिंग आंकड़े',
            'title' => 'लाइसेंसिंग आंकड़े',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'कुल लाइसेंस',
            'total_licenses_description' => 'सिस्टम में सभी लाइसेंस',
            'active_licenses' => 'सक्रिय लाइसेंस',
            'active_licenses_description' => 'वर्तमान में सक्रिय लाइसेंस',
            'total_usages' => 'कुल उपयोग',
            'total_usages_description' => 'लाइसेंस उपयोग रिकॉर्ड',
            'expiring_soon' => 'जल्दी समाप्त होने वाला',
            'expiring_soon_description' => 'अगले 30 दिनों में समाप्त होने वाले सक्रिय लाइसेंस',
            'license_scopes' => 'लाइसेंस स्कोप',
            'license_scopes_description' => 'उपलब्ध लाइसेंस प्रकार',
        ],
        'recent_usages' => [
            'heading' => 'हाल के लाइसेंस उपयोग',
        ],
        'expiring_licenses' => [
            'heading' => 'समाप्त होने वाले लाइसेंस',
            'empty_heading' => 'कोई समाप्त होने वाला लाइसेंस नहीं',
            'empty_description' => 'अगले 30 दिनों में कोई लाइसेंस समाप्त नहीं हो रहा।',
        ],
    ],

    'fields' => [
        'license_key' => 'लाइसेंस कुंजी',
        'key' => 'कुंजी',
        'scope' => 'स्कोप',
        'scope_id' => 'लाइसेंस स्कोप',
        'template' => 'लाइसेंस टेम्प्लेट',
        'licensable_type' => 'लाइसेंस प्राप्त प्रकार',
        'licensable_id' => 'लाइसेंस प्राप्त आईडी',
        'expires_at' => 'समाप्त होता है',
        'is_active' => 'सक्रिय है',
        'created_at' => 'बनाया गया',
        'updated_at' => 'अपडेट किया गया',
        'feature' => 'फीचर',
        'quantity' => 'मात्रा',
        'used_at' => 'उपयोग किया गया',
        'days_remaining' => 'शेष दिन',
        'device_id' => 'डिवाइस आईडी',
        'device_name' => 'डिवाइस नाम',
        'metadata' => 'मेटाडेटा',
        'activated_at' => 'सक्रिय किया गया',
        'deactivated_at' => 'निष्क्रिय किया गया',
    ],

    'actions' => [
        'create' => 'बनाएं',
        'edit' => 'संपादित करें',
        'view' => 'देखें',
        'delete' => 'हटाएं',
        'deactivate' => 'निष्क्रिय करें',
    ],

    'filters' => [
        'active' => 'सक्रिय',
        'inactive' => 'निष्क्रिय',
        'deactivated' => 'निष्क्रिय किया गया',
    ],
];
