<?php

return [
    'navigation_group' => 'Quản lý giấy phép',

    'resources' => [
        'license' => [
            'navigation_label' => 'Giấy phép',
            'model_label' => 'Giấy phép',
            'plural_model_label' => 'Giấy phép',
        ],
        'license_template' => [
            'navigation_label' => 'Mẫu giấy phép',
            'model_label' => 'Mẫu giấy phép',
            'plural_model_label' => 'Mẫu giấy phép',
        ],
        'license_usage' => [
            'navigation_label' => 'Lượt sử dụng giấy phép',
            'model_label' => 'Lượt sử dụng giấy phép',
            'plural_model_label' => 'Lượt sử dụng giấy phép',
        ],
        'license_scope' => [
            'navigation_label' => 'Phạm vi Giấy phép',
            'model_label' => 'Phạm vi Giấy phép',
            'plural_model_label' => 'Phạm vi Giấy phép',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Thống kê cấp phép',
            'title' => 'Thống kê cấp phép',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Tổng giấy phép',
            'total_licenses_description' => 'Tất cả giấy phép trong hệ thống',
            'active_licenses' => 'Giấy phép đang hoạt động',
            'active_licenses_description' => 'Giấy phép hiện đang hoạt động',
            'total_usages' => 'Tổng lượt sử dụng',
            'total_usages_description' => 'Bản ghi sử dụng giấy phép',
            'expiring_soon' => 'Sắp hết hạn',
            'expiring_soon_description' => 'Giấy phép đang hoạt động sẽ hết hạn trong 30 ngày tới',
            'license_templates' => 'Mẫu giấy phép',
            'license_templates_description' => 'Mẫu giấy phép đang hoạt động',
        ],
        'recent_usages' => [
            'heading' => 'Lượt sử dụng giấy phép gần đây',
        ],
        'expiring_licenses' => [
            'heading' => 'Giấy phép sắp hết hạn',
            'empty_heading' => 'Không có giấy phép sắp hết hạn',
            'empty_description' => 'Không có giấy phép nào hết hạn trong 30 ngày tới.',
        ],
    ],

    'fields' => [
        'license_key' => 'Khoá giấy phép',
        'key' => 'Khoá',
        'scope' => 'Phạm vi',
        'scope_id' => 'Phạm vi giấy phép',
        'template' => 'Mẫu giấy phép',
        'licensable_type' => 'Loại đối tượng cấp phép',
        'licensable_id' => 'ID đối tượng cấp phép',
        'expires_at' => 'Ngày hết hạn',
        'is_active' => 'Đang hoạt động',
        'created_at' => 'Ngày tạo',
        'updated_at' => 'Ngày cập nhật',
        'feature' => 'Tính năng',
        'quantity' => 'Số lượng',
        'used_at' => 'Ngày sử dụng',
        'days_remaining' => 'Số ngày còn lại',
        'device_id' => 'ID thiết bị',
        'device_name' => 'Tên thiết bị',
        'metadata' => 'Siêu dữ liệu',
        'activated_at' => 'Ngày kích hoạt',
        'deactivated_at' => 'Ngày ngừng kích hoạt',
    ],

    'actions' => [
        'create' => 'Tạo mới',
        'edit' => 'Chỉnh sửa',
        'view' => 'Xem',
        'delete' => 'Xoá',
        'deactivate' => 'Ngừng kích hoạt',
    ],

    'filters' => [
        'active' => 'Đang hoạt động',
        'inactive' => 'Không hoạt động',
        'deactivated' => 'Đã ngừng kích hoạt',
    ],
];
