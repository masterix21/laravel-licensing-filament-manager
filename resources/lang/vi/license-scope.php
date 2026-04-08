<?php

return [
    'form' => [
        'basic_information' => 'Thông tin cơ bản',
        'default_license_settings' => 'Cài đặt giấy phép mặc định',
        'default_license_settings_description' => 'Giá trị mặc định cho giấy phép được tạo trong phạm vi này',
        'key_rotation_settings' => 'Cài đặt xoay khoá',
        'key_rotation_settings_description' => 'Cấu hình tự động xoay khoá ký',
        'metadata' => 'Siêu dữ liệu',
    ],

    'fields' => [
        'name' => 'Tên',
        'slug' => 'Slug',
        'slug_help' => 'Định danh thân thiện URL (chỉ chữ thường, số và dấu gạch ngang)',
        'identifier' => 'Mã định danh',
        'identifier_help' => 'Mã định danh duy nhất cho API (ví dụ: com.company.product)',
        'description' => 'Mô tả',
        'is_active' => 'Đang hoạt động',
        'default_max_usages' => 'Số lần sử dụng tối đa mặc định',
        'default_duration_days' => 'Thời hạn mặc định',
        'default_duration_days_help' => 'Để trống cho giấy phép vĩnh viễn',
        'default_grace_days' => 'Thời gian gia hạn mặc định',
        'key_rotation_days' => 'Chu kỳ xoay khoá',
        'key_rotation_days_help' => 'Đặt giá trị 0 để tắt xoay tự động',
        'last_key_rotation_at' => 'Lần xoay khoá gần nhất',
        'next_key_rotation_at' => 'Lần xoay khoá tiếp theo',
        'licenses_count' => 'Tổng giấy phép',
        'active_licenses_count' => 'Giấy phép đang hoạt động',
        'meta' => 'Siêu dữ liệu bổ sung',
    ],

    'actions' => [
        'create' => 'Tạo phạm vi mới',
        'rotate_keys' => 'Xoay khoá',
        'rotate_keys_modal_heading' => 'Xoay khoá ký',
        'rotate_keys_modal_description' => 'Thao tác này sẽ thu hồi các khoá đang hoạt động và tạo khoá mới. Hành động này không thể hoàn tác.',
        'manual_rotation' => 'Xoay thủ công',
    ],

    'filters' => [
        'needs_rotation' => 'Cần xoay khoá',
        'has_licenses' => 'Có giấy phép',
    ],

    'notifications' => [
        'created' => 'Phạm vi giấy phép đã được tạo thành công.',
        'updated' => 'Phạm vi giấy phép đã được cập nhật thành công.',
    ],

    'relations' => [
        'licenses' => 'Giấy phép',
        'signing_keys' => 'Khoá ký',
    ],

    'perpetual' => 'Vĩnh viễn',
    'unlimited' => 'Không giới hạn',
    'seats' => 'chỗ',
    'days' => 'ngày',
    'none' => 'Không có',
    'rotation_days' => ':days ngày',
    'disabled' => 'Đã tắt',
];
