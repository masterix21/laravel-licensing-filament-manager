<?php

return [
    'navigation_group' => 'Управление лицензиями',

    'resources' => [
        'license' => [
            'navigation_label' => 'Лицензии',
            'model_label' => 'Лицензия',
            'plural_model_label' => 'Лицензии',
        ],
        'license_scope' => [
            'navigation_label' => 'Области лицензий',
            'model_label' => 'Область лицензии',
            'plural_model_label' => 'Области лицензий',
        ],
        'license_usage' => [
            'navigation_label' => 'Использования лицензий',
            'model_label' => 'Использование лицензии',
            'plural_model_label' => 'Использования лицензий',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Статистика лицензирования',
            'title' => 'Статистика лицензирования',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Всего лицензий',
            'total_licenses_description' => 'Все лицензии в системе',
            'active_licenses' => 'Активные лицензии',
            'active_licenses_description' => 'Текущие активные лицензии',
            'total_usages' => 'Всего использований',
            'total_usages_description' => 'Записи использования лицензий',
            'expiring_soon' => 'Истекают скоро',
            'expiring_soon_description' => 'Активные лицензии, истекающие в ближайшие 30 дней',
            'license_scopes' => 'Области лицензий',
            'license_scopes_description' => 'Доступные типы лицензий',
        ],
        'recent_usages' => [
            'heading' => 'Последние использования лицензий',
        ],
        'expiring_licenses' => [
            'heading' => 'Истекающие лицензии',
            'empty_heading' => 'Нет истекающих лицензий',
            'empty_description' => 'Нет лицензий, истекающих в ближайшие 30 дней.',
        ],
    ],

    'fields' => [
        'license_key' => 'Ключ лицензии',
        'key' => 'Ключ',
        'scope' => 'Область',
        'scope_id' => 'Область лицензии',
        'template' => 'Шаблон лицензии',
        'licensable_type' => 'Тип лицензируемого',
        'licensable_id' => 'ID лицензируемого',
        'expires_at' => 'Истекает',
        'is_active' => 'Активна',
        'created_at' => 'Создан',
        'updated_at' => 'Обновлён',
        'feature' => 'Функция',
        'quantity' => 'Количество',
        'used_at' => 'Использован',
        'days_remaining' => 'Дней осталось',
        'device_id' => 'ID устройства',
        'device_name' => 'Название устройства',
        'metadata' => 'Метаданные',
        'activated_at' => 'Активирован',
        'deactivated_at' => 'Деактивирован',
    ],

    'actions' => [
        'create' => 'Создать',
        'edit' => 'Редактировать',
        'view' => 'Просмотр',
        'delete' => 'Удалить',
        'deactivate' => 'Деактивировать',
    ],

    'filters' => [
        'active' => 'Активные',
        'inactive' => 'Неактивные',
        'deactivated' => 'Деактивированные',
    ],
];