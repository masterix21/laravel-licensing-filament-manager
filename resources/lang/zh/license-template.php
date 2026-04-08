<?php

return [
    'fields' => [
        'scope' => '范围',
        'global' => '全局',
        'name' => '模板名称',
        'slug' => '别名',
        'tier_level' => '层级',
        'parent_template' => '父模板',
        'is_active' => '活跃',
        'supports_trial' => '支持试用',
        'trial_duration_days' => '试用期（天）',
        'has_grace_period' => '有宽限期',
        'grace_period_days' => '宽限期（天）',
        'license_duration_days' => '许可证有效期（天）',
        'default_max_usages' => '默认最大使用次数',
        'days' => ':count 天',
        'base_configuration' => '基础配置',
        'features' => '功能',
        'entitlements' => '权限',
        'meta' => '元数据',
        'licenses_count' => '许可证',
    ],

    'form' => [
        'details' => '模板详情',
        'durations' => '期限与周期',
        'configuration' => '配置和功能',
        'metadata' => '元数据',
    ],

    'actions' => [
        'create' => '新建模板',
    ],

    'filters' => [
        'is_active' => '仅活跃模板',
    ],

    'help' => [
        'license_duration_days' => '留空表示永久许可证',
        'trial_duration_days' => '试用期天数',
        'grace_period_days' => '过期后宽限期天数',
        'base_configuration' => '合并到许可证基础配置中的键/值对（例如 max_usages、validity_days、grace_days）。',
        'features' => '向客户端公开的功能开关的布尔标志。',
        'entitlements' => '数字或字符串权限（限制、容量等）。',
        'default_max_usages' => '每个许可证的最大并发使用次数',
    ],
];
