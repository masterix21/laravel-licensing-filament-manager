<?php

return [
    'navigation_group' => 'ライセンス管理',
    'resources' => [
        'license' => ['navigation_label' => 'ライセンス', 'model_label' => 'ライセンス', 'plural_model_label' => 'ライセンス'],
        'license_template' => ['navigation_label' => 'ライセンステンプレート', 'model_label' => 'ライセンステンプレート', 'plural_model_label' => 'ライセンステンプレート'],
        'license_usage' => ['navigation_label' => 'ライセンス使用状況', 'model_label' => 'ライセンス使用状況', 'plural_model_label' => 'ライセンス使用状況'],
        'license_scope' => ['navigation_label' => 'ライセンススコープ', 'model_label' => 'ライセンススコープ', 'plural_model_label' => 'ライセンススコープ'],
    ],
    'pages' => ['statistics' => ['navigation_label' => 'ライセンス統計', 'title' => 'ライセンス統計']],
    'widgets' => [
        'stats' => [
            'total_licenses' => 'ライセンス総数', 'total_licenses_description' => 'システム内の全ライセンス',
            'active_licenses' => '有効なライセンス', 'active_licenses_description' => '現在有効なライセンス',
            'total_usages' => '使用総数', 'total_usages_description' => 'ライセンス使用記録',
            'expiring_soon' => 'まもなく期限切れ', 'expiring_soon_description' => '今後30日以内に期限切れとなる有効なライセンス',
            'license_templates' => 'ライセンステンプレート', 'license_templates_description' => '有効なライセンステンプレート',
        ],
        'recent_usages' => ['heading' => '最近のライセンス使用状況'],
        'expiring_licenses' => ['heading' => '期限切れ間近のライセンス', 'empty_heading' => '期限切れ間近のライセンスはありません', 'empty_description' => '今後30日以内に期限切れとなるライセンスはありません。'],
    ],
    'fields' => [
        'license_key' => 'ライセンスキー', 'key' => 'キー', 'scope' => 'スコープ', 'scope_id' => 'ライセンススコープ',
        'template' => 'ライセンステンプレート', 'licensable_type' => 'ライセンス対象タイプ', 'licensable_id' => 'ライセンス対象 ID',
        'expires_at' => '有効期限', 'is_active' => '有効', 'created_at' => '作成日時', 'updated_at' => '更新日時',
        'feature' => '機能', 'quantity' => '数量', 'used_at' => '使用日時', 'days_remaining' => '残り日数',
        'device_id' => 'デバイス ID', 'device_name' => 'デバイス名', 'metadata' => 'メタデータ',
        'activated_at' => 'アクティベート日時', 'deactivated_at' => '無効化日時',
    ],
    'actions' => ['create' => '作成', 'edit' => '編集', 'view' => '表示', 'delete' => '削除', 'deactivate' => '無効化'],
    'filters' => ['active' => '有効', 'inactive' => '無効', 'deactivated' => '無効化済み'],
];
