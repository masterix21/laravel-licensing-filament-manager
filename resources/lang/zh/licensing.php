<?php

return [
    'navigation_group' => '许可证管理',

    'resources' => [
        'license' => [
            'navigation_label' => '许可证',
            'model_label' => '许可证',
            'plural_model_label' => '许可证',
        ],
        'license_scope' => [
            'navigation_label' => '许可证范围',
            'model_label' => '许可证范围',
            'plural_model_label' => '许可证范围',
        ],
        'license_usage' => [
            'navigation_label' => '许可证使用',
            'model_label' => '许可证使用',
            'plural_model_label' => '许可证使用',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => '许可统计',
            'title' => '许可统计',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => '许可证总数',
            'total_licenses_description' => '系统中的所有许可证',
            'active_licenses' => '活跃许可证',
            'active_licenses_description' => '当前活跃的许可证',
            'total_usages' => '使用总数',
            'total_usages_description' => '许可证使用记录',
            'expiring_soon' => '即将过期',
            'expiring_soon_description' => '在未来30天内过期的活跃许可证',
            'license_scopes' => '许可证范围',
            'license_scopes_description' => '可用的许可证类型',
        ],
        'recent_usages' => [
            'heading' => '最近的许可证使用',
        ],
        'expiring_licenses' => [
            'heading' => '即将过期的许可证',
            'empty_heading' => '没有即将过期的许可证',
            'empty_description' => '在未来30天内没有过期的许可证。',
        ],
    ],

    'fields' => [
        'license_key' => '许可证密钥',
        'key' => '密钥',
        'scope' => '范围',
        'scope_id' => '许可证范围',
        'template' => '许可证模板',
        'licensable_type' => '可许可类型',
        'licensable_id' => '可许可ID',
        'expires_at' => '过期时间',
        'is_active' => '是否活跃',
        'created_at' => '创建时间',
        'updated_at' => '更新时间',
        'feature' => '功能',
        'quantity' => '数量',
        'used_at' => '使用时间',
        'days_remaining' => '剩余天数',
        'device_id' => '设备ID',
        'device_name' => '设备名称',
        'metadata' => '元数据',
        'activated_at' => '激活时间',
        'deactivated_at' => '停用时间',
    ],

    'actions' => [
        'create' => '创建',
        'edit' => '编辑',
        'view' => '查看',
        'delete' => '删除',
        'deactivate' => '停用',
    ],

    'filters' => [
        'active' => '活跃',
        'inactive' => '非活跃',
        'deactivated' => '已停用',
    ],
];