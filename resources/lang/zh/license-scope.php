<?php

return [
    'form' => [
        'basic_information' => '基本信息',
        'default_license_settings' => '默认许可证设置',
        'default_license_settings_description' => '在此范围内创建的许可证的默认值',
        'key_rotation_settings' => '密钥轮换设置',
        'key_rotation_settings_description' => '自动签名密钥轮换配置',
        'metadata' => '元数据',
    ],

    'fields' => [
        'name' => '名称',
        'slug' => '别名',
        'slug_help' => 'URL友好的标识符（仅限小写字母、数字和连字符）',
        'identifier' => '标识符',
        'identifier_help' => 'API使用的唯一标识符（例如：com.company.product）',
        'description' => '描述',
        'is_active' => '活跃',
        'default_max_usages' => '默认最大使用次数',
        'default_duration_days' => '默认持续时间（天）',
        'default_duration_days_help' => '留空表示永久许可证',
        'default_grace_days' => '默认宽限期（天）',
        'key_rotation_days' => '密钥轮换间隔（天）',
        'key_rotation_days_help' => '设置为0以禁用自动轮换',
        'last_key_rotation_at' => '上次密钥轮换',
        'next_key_rotation_at' => '下次计划轮换',
        'licenses_count' => '许可证总数',
        'active_licenses_count' => '活跃许可证数',
        'meta' => '附加元数据',
    ],

    'actions' => [
        'create' => '新建许可证范围',
        'rotate_keys' => '轮换密钥',
        'rotate_keys_modal_heading' => '轮换签名密钥',
        'rotate_keys_modal_description' => '这将撤销当前活跃密钥并生成新密钥。此操作无法撤销。',
        'manual_rotation' => '手动轮换',
    ],

    'filters' => [
        'needs_rotation' => '需要密钥轮换',
        'has_licenses' => '有许可证',
    ],

    'notifications' => [
        'created' => '许可证范围创建成功。',
        'updated' => '许可证范围更新成功。',
    ],

    'relations' => [
        'licenses' => '许可证',
        'signing_keys' => '签名密钥',
    ],

    'perpetual' => '永久',
    'rotation_days' => ':days 天',
    'disabled' => '已禁用',
];
