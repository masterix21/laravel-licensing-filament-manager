<?php

return [
    'form' => [
        'basic_information' => 'ข้อมูลพื้นฐาน',
        'default_license_settings' => 'การตั้งค่าใบอนุญาตเริ่มต้น',
        'default_license_settings_description' => 'ค่าเริ่มต้นสำหรับใบอนุญาตที่สร้างภายในขอบเขตนี้',
        'key_rotation_settings' => 'การตั้งค่าการหมุนเวียนคีย์',
        'key_rotation_settings_description' => 'การตั้งค่าการหมุนเวียนคีย์ลงนามอัตโนมัติ',
        'metadata' => 'ข้อมูลเมตา',
    ],

    'fields' => [
        'name' => 'ชื่อ',
        'slug' => 'Slug',
        'slug_help' => 'ตัวระบุที่เหมาะกับ URL (เฉพาะตัวอักษรพิมพ์เล็ก ตัวเลข และเครื่องหมายขีด)',
        'identifier' => 'ตัวระบุ',
        'identifier_help' => 'ตัวระบุเฉพาะสำหรับการใช้งาน API (เช่น com.company.product)',
        'description' => 'คำอธิบาย',
        'is_active' => 'ใช้งานอยู่',
        'default_max_usages' => 'จำนวนการใช้งานสูงสุดเริ่มต้น',
        'default_duration_days' => 'ระยะเวลาเริ่มต้น',
        'default_duration_days_help' => 'เว้นว่างสำหรับใบอนุญาตถาวร',
        'default_grace_days' => 'ระยะเวลาผ่อนผันเริ่มต้น',
        'key_rotation_days' => 'รอบการหมุนเวียนคีย์',
        'key_rotation_days_help' => 'ตั้งค่าเป็น 0 เพื่อปิดการหมุนเวียนอัตโนมัติ',
        'last_key_rotation_at' => 'การหมุนเวียนคีย์ครั้งล่าสุด',
        'next_key_rotation_at' => 'การหมุนเวียนคีย์ครั้งถัดไป',
        'licenses_count' => 'จำนวนใบอนุญาตทั้งหมด',
        'active_licenses_count' => 'ใบอนุญาตที่ใช้งานอยู่',
        'meta' => 'ข้อมูลเมตาเพิ่มเติม',
    ],

    'actions' => [
        'create' => 'สร้างขอบเขตใหม่',
        'rotate_keys' => 'หมุนเวียนคีย์',
        'rotate_keys_modal_heading' => 'หมุนเวียนคีย์ลงนาม',
        'rotate_keys_modal_description' => 'การดำเนินการนี้จะเพิกถอนคีย์ที่ใช้งานอยู่และสร้างคีย์ใหม่ ไม่สามารถยกเลิกได้',
        'manual_rotation' => 'หมุนเวียนด้วยตนเอง',
    ],

    'filters' => [
        'needs_rotation' => 'ต้องหมุนเวียนคีย์',
        'has_licenses' => 'มีใบอนุญาต',
    ],

    'notifications' => [
        'created' => 'สร้างขอบเขตใบอนุญาตสำเร็จแล้ว',
        'updated' => 'อัปเดตขอบเขตใบอนุญาตสำเร็จแล้ว',
    ],

    'relations' => [
        'licenses' => 'ใบอนุญาต',
        'signing_keys' => 'คีย์ลงนาม',
    ],

    'perpetual' => 'ถาวร',
    'unlimited' => 'ไม่จำกัด',
    'seats' => 'ที่นั่ง',
    'days' => 'วัน',
    'none' => 'ไม่มี',
    'rotation_days' => ':days วัน',
    'disabled' => 'ปิดใช้งาน',
];
