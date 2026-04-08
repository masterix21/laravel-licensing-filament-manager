<?php

return [
    'fields' => [
        'usage_fingerprint' => '使用フィンガープリント',
        'status' => 'ステータス',
        'client_type' => 'クライアント種別',
        'name' => '名前',
        'ip' => 'IP アドレス',
        'user_agent' => 'User Agent',
        'registered_at' => '登録日時',
        'last_seen_at' => '最終確認日時',
        'revoked_at' => '失効日時',
    ],
    'actions' => [
        'revoke' => '使用を失効',
        'revoke_selected' => '選択項目を失効',
        'heartbeat' => 'ハートビートを更新',
    ],
    'filters' => ['inactive' => '非アクティブ（7日以上）'],
    'help' => ['usage_fingerprint' => '通常、デバイスまたはインストールの識別子のハッシュです。'],
    'notifications' => ['revoked' => '使用を失効しました。'],
];
