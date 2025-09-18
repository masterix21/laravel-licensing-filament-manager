<?php

return [
    'form' => [
        'basic_information' => '许可证信息',
        'dates_activation' => '日期和激活',
        'usage_statistics' => '使用统计',
        'metadata' => '元数据',
        'security' => '安全',
    ],

    'fields' => [
        'id' => '许可证ID',
        'key_hash' => '许可证密钥哈希',
        'status' => '状态',
        'license_scope' => '许可证范围',
        'licensable' => '被许可实体',
        'template' => '许可证模板',
        'max_usages' => '最大使用次数',
        'usages' => '使用次数',
        'remaining_usages' => '剩余使用次数',
        'usage_percentage' => '使用率',
        'duration_days' => '持续时间（天）',
        'activated_at' => '激活时间',
        'expires_at' => '过期时间',
        'meta' => '元数据',
        'key_visibility' => '密钥检索',
    ],

    'actions' => [
        'create' => '新建许可证',
        'activate' => '激活',
        'suspend' => '暂停',
        'renew' => '续费',
        'show_key' => '显示许可证密钥',
        'regenerate_key' => '重新生成许可证密钥',
    ],

    'filters' => [
        'expired' => '已过期',
        'expiring_soon' => '即将过期',
        'over_limit' => '超出使用限制',
    ],

    'help' => [
        'expires_at' => '留空以根据模板默认值或范围配置自动计算。',
        'template' => '模板控制最大使用次数、有效期、功能和权限。',
    ],

    'notifications' => [
        'created' => '许可证创建成功。',
        'updated' => '许可证更新成功。',
        'activated' => '许可证激活成功。',
        'suspended' => '许可证暂停成功。',
        'renewed' => '许可证续费成功。',
        'key_generated' => '许可证密钥已生成。',
        'key_retrieved' => '许可证密钥已就绪。',
        'key_regenerated' => '许可证密钥已重新生成。',
        'key_unavailable' => '无法检索许可证密钥，因为检索功能已禁用。',
        'key_value' => '许可证密钥：:key',
    ],

    'relations' => [
        'usages' => '使用记录',
        'renewals' => '续费记录',
        'transfers' => '转移记录',
    ],

    'security' => [
        'key_not_yet_generated' => '许可证密钥将在保存后生成。',
        'key_retrievable' => '加密密钥检索已启用。',
        'key_not_retrievable' => '许可配置中已禁用密钥检索。',
    ],
];
