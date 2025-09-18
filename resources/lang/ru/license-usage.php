<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Отпечаток использования',
        'status' => 'Статус',
        'client_type' => 'Тип клиента',
        'name' => 'Название',
        'ip' => 'IP-адрес',
        'user_agent' => 'User Agent',
        'registered_at' => 'Зарегистрирован',
        'last_seen_at' => 'Последняя активность',
        'revoked_at' => 'Отозван',
    ],

    'actions' => [
        'revoke' => 'Отозвать использование',
        'revoke_selected' => 'Отозвать выбранные',
        'heartbeat' => 'Обновить активность',
    ],

    'filters' => [
        'inactive' => 'Неактивные (7+ дней)',
    ],

    'help' => [
        'usage_fingerprint' => 'Обычно хеш устройства или идентификаторов установки.',
    ],

    'notifications' => [
        'revoked' => 'Использование успешно отозвано.',
    ],
];
