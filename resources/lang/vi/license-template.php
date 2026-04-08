<?php

return [
    'fields' => [
        'scope' => 'Phạm vi',
        'global' => 'Toàn cục',
        'name' => 'Tên mẫu',
        'slug' => 'Slug',
        'tier_level' => 'Cấp bậc',
        'parent_template' => 'Mẫu cha',
        'is_active' => 'Đang hoạt động',
        'supports_trial' => 'Hỗ trợ dùng thử',
        'trial_duration_days' => 'Thời gian dùng thử (Ngày)',
        'has_grace_period' => 'Có thời gian gia hạn',
        'grace_period_days' => 'Thời gian gia hạn (Ngày)',
        'license_duration_days' => 'Thời hạn giấy phép (Ngày)',
        'default_max_usages' => 'Số Lần Sử Dụng Tối Đa Mặc Định',
        'days' => ':count ngày',
        'base_configuration' => 'Cấu hình cơ bản',
        'features' => 'Tính năng',
        'entitlements' => 'Quyền hạn',
        'meta' => 'Siêu dữ liệu',
        'licenses_count' => 'Giấy phép',
    ],

    'form' => [
        'details' => 'Chi tiết mẫu',
        'durations' => 'Thời hạn & Chu kỳ',
        'configuration' => 'Cấu hình & Tính năng',
        'metadata' => 'Siêu dữ liệu',
    ],

    'actions' => [
        'create' => 'Tạo mẫu mới',
    ],

    'filters' => [
        'is_active' => 'Chỉ mẫu đang hoạt động',
    ],

    'help' => [
        'license_duration_days' => 'Để trống cho giấy phép vĩnh viễn',
        'trial_duration_days' => 'Số ngày cho thời gian dùng thử',
        'grace_period_days' => 'Số ngày cho thời gian gia hạn sau khi hết hạn',
        'base_configuration' => 'Các cặp khoá/giá trị được gộp vào cấu hình cơ bản của giấy phép (ví dụ: max_usages, validity_days, grace_days).',
        'features' => 'Các cờ boolean để bật/tắt tính năng cho phía máy khách.',
        'entitlements' => 'Quyền hạn dạng số hoặc chuỗi (giới hạn, dung lượng, v.v.).',
        'default_max_usages' => 'Số lần sử dụng đồng thời tối đa cho mỗi giấy phép',
    ],
];
