<?php

return [
    'form' => ['basic_information' => '基本情報', 'default_license_settings' => 'デフォルトライセンス設定', 'default_license_settings_description' => 'このスコープで作成されるライセンスのデフォルト値', 'key_rotation_settings' => 'キーローテーション設定', 'key_rotation_settings_description' => '署名キーの自動ローテーション設定', 'metadata' => 'メタデータ'],
    'fields' => ['name' => '名前', 'slug' => 'Slug', 'slug_help' => 'URLに適した識別子（小文字の英字、数字、ハイフンのみ）', 'identifier' => '識別子', 'identifier_help' => 'API 用の一意な識別子（例: com.company.product）', 'description' => '説明', 'is_active' => '有効', 'default_max_usages' => 'デフォルト最大使用回数', 'default_duration_days' => 'デフォルト有効期間', 'default_duration_days_help' => '永久ライセンスの場合は空のままにしてください', 'default_grace_days' => 'デフォルト猶予期間', 'key_rotation_days' => 'キーローテーション間隔', 'key_rotation_days_help' => '自動ローテーションを無効にするには0を設定してください', 'last_key_rotation_at' => '最後のキーローテーション', 'next_key_rotation_at' => '次回予定ローテーション', 'licenses_count' => 'ライセンス総数', 'active_licenses_count' => '有効なライセンス数', 'meta' => '追加メタデータ'],
    'actions' => ['create' => '新規ライセンススコープ', 'rotate_keys' => 'キーをローテーション', 'rotate_keys_modal_heading' => '署名キーをローテーション', 'rotate_keys_modal_description' => '現在のアクティブなキーを失効させ、新しいキーを生成します。この操作は取り消せません。', 'manual_rotation' => '手動ローテーション'],
    'filters' => ['needs_rotation' => 'キーローテーションが必要', 'has_licenses' => 'ライセンスあり'],
    'notifications' => ['created' => 'ライセンススコープを作成しました。', 'updated' => 'ライセンススコープを更新しました。'],
    'relations' => ['licenses' => 'ライセンス', 'signing_keys' => '署名キー'],
    'perpetual' => '永久',
    'unlimited' => '無制限',
    'seats' => '席',
    'days' => '日',
    'none' => 'なし',
    'rotation_days' => ':days 日', 'disabled' => '無効',
];
