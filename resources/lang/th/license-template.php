<?php

return [
    'fields' => [
        'scope' => 'ขอบเขต',
        'global' => 'ทั่วไป',
        'name' => 'ชื่อเทมเพลต',
        'slug' => 'Slug',
        'tier_level' => 'ระดับชั้น',
        'parent_template' => 'เทมเพลตหลัก',
        'is_active' => 'ใช้งานอยู่',
        'supports_trial' => 'รองรับทดลองใช้',
        'trial_duration_days' => 'ระยะเวลาทดลอง (วัน)',
        'has_grace_period' => 'มีระยะเวลาผ่อนผัน',
        'grace_period_days' => 'ระยะเวลาผ่อนผัน (วัน)',
        'license_duration_days' => 'ระยะเวลาใบอนุญาต (วัน)',
        'default_max_usages' => 'จำนวนการใช้งานสูงสุดเริ่มต้น',
        'days' => ':count วัน',
        'base_configuration' => 'การตั้งค่าพื้นฐาน',
        'features' => 'ฟีเจอร์',
        'entitlements' => 'สิทธิ์',
        'meta' => 'ข้อมูลเมตา',
        'licenses_count' => 'ใบอนุญาต',
    ],

    'form' => [
        'details' => 'รายละเอียดเทมเพลต',
        'durations' => 'ระยะเวลาและช่วงเวลา',
        'configuration' => 'การตั้งค่าและฟีเจอร์',
        'metadata' => 'ข้อมูลเมตา',
    ],

    'actions' => [
        'create' => 'สร้างเทมเพลตใหม่',
    ],

    'filters' => [
        'is_active' => 'เฉพาะเทมเพลตที่ใช้งานอยู่',
    ],

    'help' => [
        'license_duration_days' => 'เว้นว่างสำหรับใบอนุญาตถาวร',
        'trial_duration_days' => 'จำนวนวันสำหรับช่วงทดลองใช้',
        'grace_period_days' => 'จำนวนวันสำหรับระยะเวลาผ่อนผันหลังหมดอายุ',
        'base_configuration' => 'คู่คีย์/ค่าที่รวมเข้ากับการตั้งค่าพื้นฐานของใบอนุญาต (เช่น max_usages, validity_days, grace_days)',
        'features' => 'แฟล็กแบบ boolean สำหรับสลับเปิด/ปิดฟีเจอร์ฝั่งไคลเอนต์',
        'entitlements' => 'สิทธิ์แบบตัวเลขหรือข้อความ (ขีดจำกัด ความจุ ฯลฯ)',
        'default_max_usages' => 'จำนวนการใช้งานพร้อมกันสูงสุดต่อใบอนุญาต',
    ],
];
