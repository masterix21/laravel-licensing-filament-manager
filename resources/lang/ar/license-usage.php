<?php

return [
    'fields' => [
        'usage_fingerprint' => 'بصمة الاستخدام',
        'status' => 'الحالة',
        'client_type' => 'نوع العميل',
        'name' => 'الاسم',
        'ip' => 'عنوان IP',
        'user_agent' => 'User Agent',
        'registered_at' => 'تاريخ التسجيل',
        'last_seen_at' => 'آخر ظهور',
        'revoked_at' => 'تاريخ الإلغاء',
    ],
    'actions' => [
        'revoke' => 'إلغاء الاستخدام',
        'revoke_selected' => 'إلغاء المحدد',
        'heartbeat' => 'تحديث نبض الاتصال',
    ],
    'filters' => [
        'inactive' => 'غير نشط (أكثر من 7 أيام)',
    ],
    'help' => [
        'usage_fingerprint' => 'عادةً ما يكون تجزئة لمعرّفات الجهاز أو التثبيت.',
    ],
    'notifications' => [
        'revoked' => 'تم إلغاء الاستخدام بنجاح.',
    ],
];
