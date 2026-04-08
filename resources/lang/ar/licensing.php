<?php

return [
    'navigation_group' => 'إدارة التراخيص',
    'resources' => [
        'license' => [
            'navigation_label' => 'التراخيص',
            'model_label' => 'ترخيص',
            'plural_model_label' => 'التراخيص',
        ],
        'license_template' => [
            'navigation_label' => 'قوالب التراخيص',
            'model_label' => 'قالب ترخيص',
            'plural_model_label' => 'قوالب التراخيص',
        ],
        'license_usage' => [
            'navigation_label' => 'استخدامات التراخيص',
            'model_label' => 'استخدام ترخيص',
            'plural_model_label' => 'استخدامات التراخيص',
        ],
        'license_scope' => [
            'navigation_label' => 'نطاقات الترخيص',
            'model_label' => 'نطاق الترخيص',
            'plural_model_label' => 'نطاقات الترخيص',
        ],
    ],
    'pages' => [
        'statistics' => [
            'navigation_label' => 'إحصائيات التراخيص',
            'title' => 'إحصائيات التراخيص',
        ],
    ],
    'widgets' => [
        'stats' => [
            'total_licenses' => 'إجمالي التراخيص',
            'total_licenses_description' => 'جميع التراخيص في النظام',
            'active_licenses' => 'التراخيص النشطة',
            'active_licenses_description' => 'التراخيص النشطة حالياً',
            'total_usages' => 'إجمالي الاستخدامات',
            'total_usages_description' => 'سجلات استخدام التراخيص',
            'expiring_soon' => 'تنتهي قريباً',
            'expiring_soon_description' => 'التراخيص النشطة التي تنتهي خلال 30 يوماً',
            'license_templates' => 'قوالب التراخيص',
            'license_templates_description' => 'قوالب التراخيص النشطة',
        ],
        'recent_usages' => [
            'heading' => 'الاستخدامات الأخيرة للتراخيص',
        ],
        'expiring_licenses' => [
            'heading' => 'التراخيص المنتهية قريباً',
            'empty_heading' => 'لا توجد تراخيص منتهية قريباً',
            'empty_description' => 'لا توجد تراخيص تنتهي خلال الـ 30 يوماً القادمة.',
        ],
    ],
    'fields' => [
        'license_key' => 'مفتاح الترخيص',
        'key' => 'المفتاح',
        'scope' => 'النطاق',
        'scope_id' => 'نطاق الترخيص',
        'template' => 'قالب الترخيص',
        'licensable_type' => 'نوع الكيان المرخّص',
        'licensable_id' => 'معرّف الكيان المرخّص',
        'expires_at' => 'تاريخ الانتهاء',
        'is_active' => 'نشط',
        'created_at' => 'تاريخ الإنشاء',
        'updated_at' => 'تاريخ التحديث',
        'feature' => 'الميزة',
        'quantity' => 'الكمية',
        'used_at' => 'تاريخ الاستخدام',
        'days_remaining' => 'الأيام المتبقية',
        'device_id' => 'معرّف الجهاز',
        'device_name' => 'اسم الجهاز',
        'metadata' => 'البيانات الوصفية',
        'activated_at' => 'تاريخ التفعيل',
        'deactivated_at' => 'تاريخ الإلغاء',
    ],
    'actions' => [
        'create' => 'إنشاء',
        'edit' => 'تعديل',
        'view' => 'عرض',
        'delete' => 'حذف',
        'deactivate' => 'إلغاء التفعيل',
    ],
    'filters' => [
        'active' => 'نشط',
        'inactive' => 'غير نشط',
        'deactivated' => 'تم إلغاء التفعيل',
    ],
];
