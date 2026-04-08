<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Відбиток використання',
        'status' => 'Статус',
        'client_type' => 'Тип клієнта',
        'name' => 'Назва',
        'ip' => 'IP-адреса',
        'user_agent' => 'User Agent',
        'registered_at' => 'Зареєстровано',
        'last_seen_at' => 'Останній раз бачено',
        'revoked_at' => 'Відкликано',
    ],

    'actions' => [
        'revoke' => 'Відкликати використання',
        'revoke_selected' => 'Відкликати вибрані',
        'heartbeat' => 'Оновити сигнал',
    ],

    'filters' => [
        'inactive' => 'Неактивні (7+ днів)',
    ],

    'help' => [
        'usage_fingerprint' => 'Зазвичай хеш ідентифікаторів пристрою або інсталяції.',
    ],

    'notifications' => [
        'revoked' => 'Використання успішно відкликано.',
    ],
];
