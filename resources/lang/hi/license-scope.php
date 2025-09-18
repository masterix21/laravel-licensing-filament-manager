<?php

return [
    'form' => [
        'basic_information' => 'बुनियादी जानकारी',
        'default_license_settings' => 'डिफ़ॉल्ट लाइसेंस सेटिंग्स',
        'default_license_settings_description' => 'इस स्कोप के भीतर बनाए गए लाइसेंस के लिए डिफ़ॉल्ट मान',
        'key_rotation_settings' => 'कुंजी रोटेशन सेटिंग्स',
        'key_rotation_settings_description' => 'स्वचालित साइनिंग कुंजी रोटेशन कॉन्फ़िगरेशन',
        'metadata' => 'मेटाडेटा',
    ],

    'fields' => [
        'name' => 'नाम',
        'slug' => 'स्लग',
        'slug_help' => 'URL-अनुकूल पहचानकर्ता (केवल छोटे अक्षर, संख्या और हाइफ़न)',
        'identifier' => 'पहचानकर्ता',
        'identifier_help' => 'API उपयोग के लिए अद्वितीय पहचानकर्ता (जैसे, com.company.product)',
        'description' => 'विवरण',
        'is_active' => 'सक्रिय',
        'default_max_usages' => 'डिफ़ॉल्ट अधिकतम उपयोग',
        'default_duration_days' => 'डिफ़ॉल्ट अवधि (दिन)',
        'default_duration_days_help' => 'स्थायी लाइसेंस के लिए खाली छोड़ें',
        'default_grace_days' => 'डिफ़ॉल्ट ग्रेस अवधि (दिन)',
        'key_rotation_days' => 'कुंजी रोटेशन अंतराल (दिन)',
        'key_rotation_days_help' => 'स्वचालित रोटेशन को अक्षम करने के लिए 0 सेट करें',
        'last_key_rotation_at' => 'अंतिम कुंजी रोटेशन',
        'next_key_rotation_at' => 'अगला निर्धारित रोटेशन',
        'licenses_count' => 'कुल लाइसेंस',
        'active_licenses_count' => 'सक्रिय लाइसेंस',
        'meta' => 'अतिरिक्त मेटाडेटा',
    ],

    'actions' => [
        'create' => 'नया लाइसेंस स्कोप',
        'rotate_keys' => 'कुंजी रोटेट करें',
        'rotate_keys_modal_heading' => 'साइनिंग कुंजी रोटेट करें',
        'rotate_keys_modal_description' => 'यह वर्तमान सक्रिय कुंजियों को रद्द कर देगा और नई कुंजियां जेनेरेट करेगा। यह क्रिया पूर्ववत नहीं की जा सकती।',
        'manual_rotation' => 'मैनुअल रोटेशन',
    ],

    'filters' => [
        'needs_rotation' => 'कुंजी रोटेशन की आवश्यकता',
        'has_licenses' => 'लाइसेंस है',
    ],

    'notifications' => [
        'created' => 'लाइसेंस स्कोप सफलतापूर्वक बनाया गया।',
        'updated' => 'लाइसेंस स्कोप सफलतापूर्वक अपडेट किया गया।',
    ],

    'relations' => [
        'licenses' => 'लाइसेंस',
        'signing_keys' => 'साइनिंग कुंजी',
    ],

    'perpetual' => 'स्थायी',
    'rotation_days' => ':days दिन',
    'disabled' => 'अक्षम',
];
