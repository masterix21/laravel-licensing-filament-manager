<?php

return [
    'fields' => [
        'usage_fingerprint' => 'ลายนิ้วมือการใช้งาน',
        'status' => 'สถานะ',
        'client_type' => 'ประเภทไคลเอนต์',
        'name' => 'ชื่อ',
        'ip' => 'ที่อยู่ IP',
        'user_agent' => 'User Agent',
        'registered_at' => 'วันที่ลงทะเบียน',
        'last_seen_at' => 'เข้าใช้งานล่าสุด',
        'revoked_at' => 'วันที่เพิกถอน',
    ],

    'actions' => [
        'revoke' => 'เพิกถอนการใช้งาน',
        'revoke_selected' => 'เพิกถอนรายการที่เลือก',
        'heartbeat' => 'อัปเดต Heartbeat',
    ],

    'filters' => [
        'inactive' => 'ไม่มีกิจกรรม (7+ วัน)',
    ],

    'help' => [
        'usage_fingerprint' => 'โดยทั่วไปเป็นค่า hash ของตัวระบุอุปกรณ์หรือการติดตั้ง',
    ],

    'notifications' => [
        'revoked' => 'เพิกถอนการใช้งานสำเร็จแล้ว',
    ],
];
