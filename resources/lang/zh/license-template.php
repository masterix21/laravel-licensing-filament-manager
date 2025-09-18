<?php

return [
    'fields' => [
        'name' => '模板名称',
        'slug' => '别名',
        'tier_level' => '层级',
        'parent_template' => '父模板',
        'is_active' => '活跃',
        'license_duration_days' => '持续时间',
        'supports_trial' => '试用',
        'trial_duration_days' => '试用持续时间（天）',
        'has_grace_period' => '宽限期',
        'grace_period_days' => '宽限期（天）',
        'base_configuration' => '基础配置',
        'features' => '功能',
        'entitlements' => '权限',
        'meta' => '元数据',
    ],

    'form' => [
        'details' => '模板详情',
        'durations' => '持续时间和期间',
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
        'base_configuration' => '合并到许可证基础配置中的键/值对（例如 max_usages、validity_days）。',
        'features' => '向客户端公开的功能开关的布尔标志。',
        'entitlements' => '数字或字符串权限（限制、容量等）。',
        'license_duration_days' => '许可证有效天数。留空表示无限期。',
        'trial_duration_days' => '试用期天数。',
        'grace_period_days' => '许可证过期后到完全禁用前的天数。',
    ],

    'days' => ':count 天',
];
