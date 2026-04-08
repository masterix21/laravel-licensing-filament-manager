<?php

return [
    'navigation_group' => 'จัดการใบอนุญาต',

    'resources' => [
        'license' => [
            'navigation_label' => 'ใบอนุญาต',
            'model_label' => 'ใบอนุญาต',
            'plural_model_label' => 'ใบอนุญาต',
        ],
        'license_template' => [
            'navigation_label' => 'เทมเพลตใบอนุญาต',
            'model_label' => 'เทมเพลตใบอนุญาต',
            'plural_model_label' => 'เทมเพลตใบอนุญาต',
        ],
        'license_usage' => [
            'navigation_label' => 'การใช้งานใบอนุญาต',
            'model_label' => 'การใช้งานใบอนุญาต',
            'plural_model_label' => 'การใช้งานใบอนุญาต',
        ],
        'license_scope' => [
            'navigation_label' => 'ขอบเขตใบอนุญาต',
            'model_label' => 'ขอบเขตใบอนุญาต',
            'plural_model_label' => 'ขอบเขตใบอนุญาต',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'สถิติใบอนุญาต',
            'title' => 'สถิติใบอนุญาต',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'ใบอนุญาตทั้งหมด',
            'total_licenses_description' => 'ใบอนุญาตทั้งหมดในระบบ',
            'active_licenses' => 'ใบอนุญาตที่ใช้งานอยู่',
            'active_licenses_description' => 'ใบอนุญาตที่ใช้งานอยู่ในปัจจุบัน',
            'total_usages' => 'การใช้งานทั้งหมด',
            'total_usages_description' => 'บันทึกการใช้งานใบอนุญาต',
            'expiring_soon' => 'ใกล้หมดอายุ',
            'expiring_soon_description' => 'ใบอนุญาตที่ใช้งานอยู่ซึ่งจะหมดอายุใน 30 วันข้างหน้า',
            'license_templates' => 'เทมเพลตใบอนุญาต',
            'license_templates_description' => 'เทมเพลตใบอนุญาตที่ใช้งานอยู่',
        ],
        'recent_usages' => [
            'heading' => 'การใช้งานใบอนุญาตล่าสุด',
        ],
        'expiring_licenses' => [
            'heading' => 'ใบอนุญาตที่ใกล้หมดอายุ',
            'empty_heading' => 'ไม่มีใบอนุญาตใกล้หมดอายุ',
            'empty_description' => 'ไม่มีใบอนุญาตที่จะหมดอายุใน 30 วันข้างหน้า',
        ],
    ],

    'fields' => [
        'license_key' => 'คีย์ใบอนุญาต',
        'key' => 'คีย์',
        'scope' => 'ขอบเขต',
        'scope_id' => 'ขอบเขตใบอนุญาต',
        'template' => 'เทมเพลตใบอนุญาต',
        'licensable_type' => 'ประเภทเอนทิตีที่ได้รับอนุญาต',
        'licensable_id' => 'ID เอนทิตีที่ได้รับอนุญาต',
        'expires_at' => 'วันหมดอายุ',
        'is_active' => 'ใช้งานอยู่',
        'created_at' => 'วันที่สร้าง',
        'updated_at' => 'วันที่อัปเดต',
        'feature' => 'ฟีเจอร์',
        'quantity' => 'จำนวน',
        'used_at' => 'วันที่ใช้งาน',
        'days_remaining' => 'จำนวนวันที่เหลือ',
        'device_id' => 'ID อุปกรณ์',
        'device_name' => 'ชื่ออุปกรณ์',
        'metadata' => 'ข้อมูลเมตา',
        'activated_at' => 'วันที่เปิดใช้งาน',
        'deactivated_at' => 'วันที่ปิดใช้งาน',
    ],

    'actions' => [
        'create' => 'สร้าง',
        'edit' => 'แก้ไข',
        'view' => 'ดู',
        'delete' => 'ลบ',
        'deactivate' => 'ปิดใช้งาน',
    ],

    'filters' => [
        'active' => 'ใช้งานอยู่',
        'inactive' => 'ไม่ใช้งาน',
        'deactivated' => 'ถูกปิดใช้งาน',
    ],
];
