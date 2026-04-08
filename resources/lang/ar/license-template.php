<?php

return [
    'fields' => [
        'scope' => 'النطاق',
        'global' => 'عام',
        'name' => 'اسم القالب',
        'slug' => 'Slug',
        'tier_level' => 'مستوى الفئة',
        'parent_template' => 'القالب الأصل',
        'is_active' => 'نشط',
        'supports_trial' => 'يدعم النسخة التجريبية',
        'trial_duration_days' => 'مدة التجربة (أيام)',
        'has_grace_period' => 'له فترة سماح',
        'grace_period_days' => 'فترة السماح (أيام)',
        'license_duration_days' => 'مدة الترخيص (أيام)',
        'default_max_usages' => 'الحد الأقصى الافتراضي للاستخدامات',
        'days' => ':count أيام',
        'base_configuration' => 'الإعدادات الأساسية',
        'features' => 'الميزات',
        'entitlements' => 'الصلاحيات',
        'meta' => 'البيانات الوصفية',
        'licenses_count' => 'التراخيص',
    ],
    'form' => [
        'details' => 'تفاصيل القالب',
        'durations' => 'المدد والفترات',
        'configuration' => 'الإعدادات والميزات',
        'metadata' => 'البيانات الوصفية',
    ],
    'actions' => [
        'create' => 'قالب جديد',
    ],
    'filters' => [
        'is_active' => 'القوالب النشطة فقط',
    ],
    'help' => [
        'license_duration_days' => 'اتركه فارغًا للتراخيص الدائمة',
        'trial_duration_days' => 'عدد أيام الفترة التجريبية',
        'grace_period_days' => 'عدد أيام فترة السماح بعد انتهاء الصلاحية',
        'base_configuration' => 'أزواج مفتاح/قيمة تُدمج في الإعدادات الأساسية للترخيص (مثل: max_usages، validity_days، grace_days).',
        'features' => 'علامات منطقية لتبديل الميزات المعروضة للعملاء.',
        'entitlements' => 'صلاحيات رقمية أو نصية (حدود، سعات، إلخ).',
        'default_max_usages' => 'الحد الأقصى لعدد الاستخدامات المتزامنة لكل ترخيص',
    ],
];
