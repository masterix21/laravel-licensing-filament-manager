<?php

return [
    'fields' => ['kid' => 'キー ID', 'status' => 'ステータス', 'algorithm' => 'アルゴリズム', 'valid_from' => '有効開始日', 'valid_until' => '有効終了日', 'revoked_at' => '失効日時', 'revocation_reason' => '失効理由'],
    'actions' => [
        'generate_new' => '新しいキーを生成', 'generate_new_modal_heading' => '新しい署名キーを生成',
        'generate_new_modal_description' => 'このスコープに新しい署名キーを作成します。',
        'revoke' => 'キーを失効', 'revoke_modal_heading' => '署名キーを失効',
        'revoke_modal_description' => 'この署名キーを永久に失効させます。この操作は取り消せません。',
        'revoke_selected' => '選択したキーを失効',
    ],
    'filters' => ['expired' => '期限切れのキー'],
    'notifications' => ['generated' => '署名キーを生成しました。', 'generated_body' => '新しい署名キーを発行しました: :kid', 'revoked' => '署名キーを失効しました。', 'failed' => '署名キーを生成できませんでした。'],
];
