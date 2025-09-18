<?php

return [
    'fields' => [
        'usage_fingerprint' => '使用指纹',
        'status' => '状态',
        'client_type' => '客户端类型',
        'name' => '名称',
        'ip' => 'IP地址',
        'user_agent' => '用户代理',
        'registered_at' => '注册时间',
        'last_seen_at' => '最后使用时间',
        'revoked_at' => '撤销时间',
    ],

    'actions' => [
        'revoke' => '撤销使用',
        'revoke_selected' => '撤销选中项',
        'heartbeat' => '更新心跳',
    ],

    'filters' => [
        'inactive' => '非活跃（7天以上）',
    ],

    'help' => [
        'usage_fingerprint' => '通常是设备或安装标识符的哈希值。',
    ],

    'notifications' => [
        'revoked' => '使用已成功撤销。',
    ],
];