<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Dấu vân tay sử dụng',
        'status' => 'Trạng thái',
        'client_type' => 'Loại máy khách',
        'name' => 'Tên',
        'ip' => 'Địa chỉ IP',
        'user_agent' => 'User Agent',
        'registered_at' => 'Ngày đăng ký',
        'last_seen_at' => 'Lần truy cập cuối',
        'revoked_at' => 'Ngày thu hồi',
    ],

    'actions' => [
        'revoke' => 'Thu hồi lượt sử dụng',
        'revoke_selected' => 'Thu hồi mục đã chọn',
        'heartbeat' => 'Cập nhật nhịp tim',
    ],

    'filters' => [
        'inactive' => 'Không hoạt động (7+ ngày)',
    ],

    'help' => [
        'usage_fingerprint' => 'Thường là giá trị hash của mã định danh thiết bị hoặc bản cài đặt.',
    ],

    'notifications' => [
        'revoked' => 'Lượt sử dụng đã bị thu hồi thành công.',
    ],
];
