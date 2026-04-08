<?php

return [
    'fields' => [
        'kid' => 'ID คีย์',
        'status' => 'สถานะ',
        'algorithm' => 'อัลกอริทึม',
        'valid_from' => 'มีผลตั้งแต่',
        'valid_until' => 'มีผลจนถึง',
        'revoked_at' => 'วันที่เพิกถอน',
        'revocation_reason' => 'เหตุผลในการเพิกถอน',
    ],

    'actions' => [
        'generate_new' => 'สร้างคีย์ใหม่',
        'generate_new_modal_heading' => 'สร้างคีย์ลงนามใหม่',
        'generate_new_modal_description' => 'การดำเนินการนี้จะสร้างคีย์ลงนามใหม่สำหรับขอบเขตนี้',
        'revoke' => 'เพิกถอนคีย์',
        'revoke_modal_heading' => 'เพิกถอนคีย์ลงนาม',
        'revoke_modal_description' => 'การดำเนินการนี้จะเพิกถอนคีย์ลงนามนี้อย่างถาวร ไม่สามารถยกเลิกได้',
        'revoke_selected' => 'เพิกถอนคีย์ที่เลือก',
    ],

    'filters' => [
        'expired' => 'คีย์ที่หมดอายุ',
    ],

    'notifications' => [
        'generated' => 'สร้างคีย์ลงนามสำเร็จแล้ว',
        'generated_body' => 'คีย์ลงนามใหม่ที่ออก: :kid',
        'revoked' => 'เพิกถอนคีย์ลงนามแล้ว',
        'failed' => 'ไม่สามารถสร้างคีย์ลงนามได้',
    ],
];
