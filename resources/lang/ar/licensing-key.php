<?php

return [
    'fields' => [
        'kid' => 'معرّف المفتاح',
        'status' => 'الحالة',
        'algorithm' => 'الخوارزمية',
        'valid_from' => 'صالح من',
        'valid_until' => 'صالح حتى',
        'revoked_at' => 'تاريخ الإلغاء',
        'revocation_reason' => 'سبب الإلغاء',
    ],
    'actions' => [
        'generate_new' => 'إنشاء مفتاح جديد',
        'generate_new_modal_heading' => 'إنشاء مفتاح توقيع جديد',
        'generate_new_modal_description' => 'سيتم إنشاء مفتاح توقيع جديد لهذا النطاق.',
        'revoke' => 'إلغاء المفتاح',
        'revoke_modal_heading' => 'إلغاء مفتاح التوقيع',
        'revoke_modal_description' => 'سيتم إلغاء مفتاح التوقيع هذا بشكل دائم. لا يمكن التراجع عن هذا الإجراء.',
        'revoke_selected' => 'إلغاء المفاتيح المحددة',
    ],
    'filters' => [
        'expired' => 'مفاتيح منتهية الصلاحية',
    ],
    'notifications' => [
        'generated' => 'تم إنشاء مفتاح التوقيع بنجاح.',
        'generated_body' => 'مفتاح توقيع جديد صادر: :kid',
        'revoked' => 'تم إلغاء مفتاح التوقيع.',
        'failed' => 'تعذّر إنشاء مفتاح التوقيع.',
    ],
];
