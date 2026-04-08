<?php

return [
    'form' => [
        'basic_information' => 'Thông tin giấy phép',
        'dates_activation' => 'Ngày & Kích hoạt',
        'usage_statistics' => 'Thống kê sử dụng',
        'metadata' => 'Siêu dữ liệu',
        'security' => 'Bảo mật',
    ],

    'fields' => [
        'id' => 'ID giấy phép',
        'key_hash' => 'Hash khoá giấy phép',
        'status' => 'Trạng thái',
        'license_scope' => 'Phạm vi giấy phép',
        'licensable' => 'Đối tượng được cấp phép',
        'template' => 'Mẫu giấy phép',
        'max_usages' => 'Số lần sử dụng tối đa',
        'usages' => 'Số lần đã sử dụng',
        'remaining_usages' => 'Số lần sử dụng còn lại',
        'usage_percentage' => '% Sử dụng',
        'duration_days' => 'Thời hạn (Ngày)',
        'activated_at' => 'Ngày kích hoạt',
        'expires_at' => 'Ngày hết hạn',
        'meta' => 'Siêu dữ liệu',
        'key_visibility' => 'Truy xuất khoá',
    ],

    'actions' => [
        'create' => 'Tạo giấy phép mới',
        'activate' => 'Kích hoạt',
        'suspend' => 'Tạm ngưng',
        'renew' => 'Gia hạn',
        'show_key' => 'Hiển thị khoá giấy phép',
        'regenerate_key' => 'Tạo lại khoá giấy phép',
    ],

    'filters' => [
        'expired' => 'Đã hết hạn',
        'expiring_soon' => 'Sắp hết hạn',
        'over_limit' => 'Vượt giới hạn sử dụng',
    ],

    'help' => [
        'expires_at' => 'Để trống để tự động tính toán dựa trên mẫu mặc định hoặc cấu hình phạm vi.',
        'template' => 'Mẫu kiểm soát số lần sử dụng tối đa, thời hạn, tính năng và quyền.',
    ],

    'notifications' => [
        'created' => 'Giấy phép đã được tạo thành công.',
        'updated' => 'Giấy phép đã được cập nhật thành công.',
        'activated' => 'Giấy phép đã được kích hoạt thành công.',
        'suspended' => 'Giấy phép đã bị tạm ngưng thành công.',
        'renewed' => 'Giấy phép đã được gia hạn thành công.',
        'key_generated' => 'Khoá giấy phép đã được tạo.',
        'key_retrieved' => 'Khoá giấy phép đã sẵn sàng.',
        'key_regenerated' => 'Khoá giấy phép đã được tạo lại.',
        'key_unavailable' => 'Không thể truy xuất khoá giấy phép vì chức năng truy xuất đã bị tắt.',
        'key_value' => 'Khoá giấy phép: :key',
    ],

    'statuses' => [
        'pending' => 'Đang chờ',
        'active' => 'Hoạt động',
        'grace' => 'Thời gian gia hạn',
        'expired' => 'Hết hạn',
        'suspended' => 'Tạm ngưng',
        'cancelled' => 'Đã hủy',
    ],

    'relations' => [
        'usages' => 'Lượt sử dụng',
        'renewals' => 'Gia hạn',
        'transfers' => 'Chuyển nhượng',
        'trials' => 'Dùng thử',
    ],

    'security' => [
        'key_not_yet_generated' => 'Khoá giấy phép sẽ được tạo sau khi lưu.',
        'key_retrievable' => 'Đã bật truy xuất khoá mã hoá.',
        'key_not_retrievable' => 'Truy xuất khoá bị tắt trong cấu hình cấp phép.',
    ],
];
