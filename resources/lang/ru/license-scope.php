<?php

return [
    'form' => [
        'basic_information' => 'Основная информация',
        'default_license_settings' => 'Настройки лицензии по умолчанию',
        'default_license_settings_description' => 'Значения по умолчанию для лицензий, созданных в этой области',
        'key_rotation_settings' => 'Настройки ротации ключей',
        'key_rotation_settings_description' => 'Конфигурация автоматической ротации ключей подписи',
        'metadata' => 'Метаданные',
    ],

    'fields' => [
        'name' => 'Название',
        'slug' => 'Слаг',
        'slug_help' => 'URL-идентификатор (только строчные буквы, цифры и дефисы)',
        'identifier' => 'Идентификатор',
        'identifier_help' => 'Уникальный идентификатор для использования в API (например, com.company.product)',
        'description' => 'Описание',
        'is_active' => 'Активный',
        'default_max_usages' => 'Макс. использований по умолчанию',
        'default_duration_days' => 'Продолжительность по умолчанию (дни)',
        'default_duration_days_help' => 'Оставьте пустым для бессрочных лицензий',
        'default_grace_days' => 'Льготный период по умолчанию (дни)',
        'key_rotation_days' => 'Интервал ротации ключей (дни)',
        'key_rotation_days_help' => 'Установите 0 для отключения автоматической ротации',
        'last_key_rotation_at' => 'Последняя ротация ключей',
        'next_key_rotation_at' => 'Следующая запланированная ротация',
        'licenses_count' => 'Всего лицензий',
        'active_licenses_count' => 'Активных лицензий',
        'meta' => 'Дополнительные метаданные',
    ],

    'actions' => [
        'create' => 'Новая область лицензий',
        'rotate_keys' => 'Повернуть ключи',
        'rotate_keys_modal_heading' => 'Ротация ключей подписи',
        'rotate_keys_modal_description' => 'Это отзовёт текущие активные ключи и сгенерирует новые. Это действие нельзя отменить.',
        'manual_rotation' => 'Ручная ротация',
    ],

    'filters' => [
        'needs_rotation' => 'Требует ротации ключей',
        'has_licenses' => 'Имеет лицензии',
    ],

    'notifications' => [
        'created' => 'Область лицензий успешно создана.',
        'updated' => 'Область лицензий успешно обновлена.',
    ],

    'relations' => [
        'licenses' => 'Лицензии',
        'signing_keys' => 'Ключи подписи',
    ],

    'perpetual' => 'Бессрочная',
    'rotation_days' => ':days дней',
    'disabled' => 'Отключена',
];