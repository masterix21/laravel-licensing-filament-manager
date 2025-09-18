<?php

return [
    'fields' => [
        'kid' => '密钥ID',
        'status' => '状态',
        'algorithm' => '算法',
        'valid_from' => '有效起始',
        'valid_until' => '有效截止',
        'revoked_at' => '撤销时间',
        'revocation_reason' => '撤销原因',
    ],

    'actions' => [
        'generate_new' => '生成新密钥',
        'generate_new_modal_heading' => '生成新签名密钥',
        'generate_new_modal_description' => '这将为此范围创建一个新的签名密钥。',
        'revoke' => '撤销密钥',
        'revoke_modal_heading' => '撤销签名密钥',
        'revoke_modal_description' => '这将永久撤销此签名密钥。此操作无法撤销。',
        'revoke_selected' => '撤销选中的密钥',
    ],

    'filters' => [
        'expired' => '已过期的密钥',
    ],

    'notifications' => [
        'generated' => '签名密钥生成成功。',
        'generated_body' => '新签名密钥已发放：:kid',
        'revoked' => '签名密钥已撤销。',
        'failed' => '无法生成签名密钥。',
    ],
];
