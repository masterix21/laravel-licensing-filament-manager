<?php

return [
    'fields' => [
        'name' => 'टेम्प्लेट नाम',
        'slug' => 'स्लग',
        'tier_level' => 'टियर स्तर',
        'parent_template' => 'मूल टेम्प्लेट',
        'is_active' => 'सक्रिय',
        'license_duration_days' => 'अवधि',
        'supports_trial' => 'ट्रायल',
        'trial_duration_days' => 'ट्रायल अवधि (दिन)',
        'has_grace_period' => 'ग्रेस अवधि',
        'grace_period_days' => 'ग्रेस अवधि (दिन)',
        'base_configuration' => 'बेस कॉन्फ़िगरेशन',
        'features' => 'फीचर्स',
        'entitlements' => 'हकदारी',
        'meta' => 'मेटाडेटा',
    ],

    'form' => [
        'details' => 'टेम्प्लेट विवरण',
        'durations' => 'अवधि और काल',
        'configuration' => 'कॉन्फ़िगरेशन और फीचर्स',
        'metadata' => 'मेटाडेटा',
    ],

    'actions' => [
        'create' => 'नया टेम्प्लेट',
    ],

    'filters' => [
        'is_active' => 'केवल सक्रिय टेम्प्लेट',
    ],

    'help' => [
        'base_configuration' => 'लाइसेंस बेस कॉन्फ़िगरेशन में मर्ज किए गए कुंजी/मान जोड़े (जैसे max_usages, validity_days)।',
        'features' => 'क्लाइंट को उजागर किए गए फीचर टॉगल के लिए बूलियन फ्लैग।',
        'entitlements' => 'संख्यात्मक या स्ट्रिंग हकदारी (सीमा, क्षमता, आदि)।',
        'license_duration_days' => 'लाइसेंस जिन दिनों के लिए वैध है। असीमित अवधि के लिए खाली छोड़ें।',
        'trial_duration_days' => 'ट्रायल अवधि के लिए दिनों की संख्या।',
        'grace_period_days' => 'लाइसेंस पूरी तरह से अक्षम होने से पहले समाप्ति के बाद दिनों की संख्या।',
    ],

    'days' => ':count दिन',
];