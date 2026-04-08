<?php

return [
    'fields' => [
        'scope' => 'स्कोप',
        'global' => 'वैश्विक',
        'name' => 'टेम्प्लेट नाम',
        'slug' => 'स्लग',
        'tier_level' => 'टियर स्तर',
        'parent_template' => 'मूल टेम्प्लेट',
        'is_active' => 'सक्रिय',
        'supports_trial' => 'परीक्षण का समर्थन करता है',
        'trial_duration_days' => 'परीक्षण अवधि (दिन)',
        'has_grace_period' => 'अनुग्रह अवधि है',
        'grace_period_days' => 'अनुग्रह अवधि (दिन)',
        'license_duration_days' => 'लाइसेंस अवधि (दिन)',
        'default_max_usages' => 'डिफ़ॉल्ट अधिकतम उपयोग',
        'days' => ':count दिन',
        'base_configuration' => 'बेस कॉन्फ़िगरेशन',
        'features' => 'फीचर्स',
        'entitlements' => 'हकदारी',
        'meta' => 'मेटाडेटा',
        'licenses_count' => 'लाइसेंस',
    ],

    'form' => [
        'details' => 'टेम्प्लेट विवरण',
        'durations' => 'अवधि और अवधि',
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
        'license_duration_days' => 'स्थायी लाइसेंस के लिए खाली छोड़ें',
        'trial_duration_days' => 'परीक्षण अवधि के लिए दिनों की संख्या',
        'grace_period_days' => 'समाप्ति के बाद अनुग्रह अवधि के लिए दिनों की संख्या',
        'base_configuration' => 'लाइसेंस बेस कॉन्फ़िगरेशन में मर्ज किए गए कुंजी/मान जोड़े (जैसे max_usages, validity_days, grace_days)।',
        'features' => 'क्लाइंट को उजागर किए गए फीचर टॉगल के लिए बूलियन फ्लैग।',
        'entitlements' => 'संख्यात्मक या स्ट्रिंग हकदारी (सीमा, क्षमता, आदि)।',
        'default_max_usages' => 'प्रति लाइसेंस एक साथ उपयोग की अधिकतम संख्या',
    ],
];
