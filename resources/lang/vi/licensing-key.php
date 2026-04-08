<?php

return [
    'fields' => [
        'kid' => 'ID khoá',
        'status' => 'Trạng thái',
        'algorithm' => 'Thuật toán',
        'valid_from' => 'Có hiệu lực từ',
        'valid_until' => 'Có hiệu lực đến',
        'revoked_at' => 'Ngày thu hồi',
        'revocation_reason' => 'Lý do thu hồi',
    ],

    'actions' => [
        'generate_new' => 'Tạo khoá mới',
        'generate_new_modal_heading' => 'Tạo khoá ký mới',
        'generate_new_modal_description' => 'Thao tác này sẽ tạo một khoá ký mới cho phạm vi này.',
        'revoke' => 'Thu hồi khoá',
        'revoke_modal_heading' => 'Thu hồi khoá ký',
        'revoke_modal_description' => 'Thao tác này sẽ thu hồi vĩnh viễn khoá ký này. Hành động này không thể hoàn tác.',
        'revoke_selected' => 'Thu hồi các khoá đã chọn',
    ],

    'filters' => [
        'expired' => 'Khoá đã hết hạn',
    ],

    'notifications' => [
        'generated' => 'Khoá ký đã được tạo thành công.',
        'generated_body' => 'Khoá ký mới đã được cấp: :kid',
        'revoked' => 'Khoá ký đã bị thu hồi.',
        'failed' => 'Không thể tạo khoá ký.',
    ],
];
