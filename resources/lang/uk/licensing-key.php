<?php

return [
    'fields' => [
        'kid' => 'ID ключа',
        'status' => 'Статус',
        'algorithm' => 'Алгоритм',
        'valid_from' => 'Дійсний з',
        'valid_until' => 'Дійсний до',
        'revoked_at' => 'Відкликано',
        'revocation_reason' => 'Причина відкликання',
    ],

    'actions' => [
        'generate_new' => 'Згенерувати новий ключ',
        'generate_new_modal_heading' => 'Згенерувати новий ключ підпису',
        'generate_new_modal_description' => 'Буде створено новий ключ підпису для цієї області.',
        'revoke' => 'Відкликати ключ',
        'revoke_modal_heading' => 'Відкликати ключ підпису',
        'revoke_modal_description' => 'Ключ підпису буде остаточно відкликано. Цю дію неможливо скасувати.',
        'revoke_selected' => 'Відкликати вибрані ключі',
    ],

    'filters' => [
        'expired' => 'Прострочені ключі',
    ],

    'notifications' => [
        'generated' => 'Ключ підпису успішно згенеровано.',
        'generated_body' => 'Видано новий ключ підпису: :kid',
        'revoked' => 'Ключ підпису відкликано.',
        'failed' => 'Не вдалося згенерувати ключ підпису.',
    ],
];
