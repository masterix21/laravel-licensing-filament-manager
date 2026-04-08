<?php

return [
    'navigation_group' => 'Управління ліцензіями',

    'resources' => [
        'license' => [
            'navigation_label' => 'Ліцензії',
            'model_label' => 'Ліцензія',
            'plural_model_label' => 'Ліцензії',
        ],
        'license_template' => [
            'navigation_label' => 'Шаблони ліцензій',
            'model_label' => 'Шаблон ліцензії',
            'plural_model_label' => 'Шаблони ліцензій',
        ],
        'license_usage' => [
            'navigation_label' => 'Використання ліцензій',
            'model_label' => 'Використання ліцензії',
            'plural_model_label' => 'Використання ліцензій',
        ],
        'license_scope' => [
            'navigation_label' => 'Області ліцензій',
            'model_label' => 'Область ліцензії',
            'plural_model_label' => 'Області ліцензій',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Статистика ліцензування',
            'title' => 'Статистика ліцензування',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Усього ліцензій',
            'total_licenses_description' => 'Усі ліцензії в системі',
            'active_licenses' => 'Активні ліцензії',
            'active_licenses_description' => 'Поточні активні ліцензії',
            'total_usages' => 'Усього використань',
            'total_usages_description' => 'Записи використання ліцензій',
            'expiring_soon' => 'Скоро закінчуються',
            'expiring_soon_description' => 'Активні ліцензії, що закінчуються протягом 30 днів',
            'license_templates' => 'Шаблони ліцензій',
            'license_templates_description' => 'Активні шаблони ліцензій',
        ],
        'recent_usages' => [
            'heading' => 'Останні використання ліцензій',
        ],
        'expiring_licenses' => [
            'heading' => 'Ліцензії, що закінчуються',
            'empty_heading' => 'Немає ліцензій, що закінчуються',
            'empty_description' => 'Немає ліцензій, що закінчуються протягом наступних 30 днів.',
        ],
    ],

    'fields' => [
        'license_key' => 'Ключ ліцензії',
        'key' => 'Ключ',
        'scope' => 'Область',
        'scope_id' => 'Область ліцензії',
        'template' => 'Шаблон ліцензії',
        'licensable_type' => 'Тип ліцензованого обʼєкта',
        'licensable_id' => 'ID ліцензованого обʼєкта',
        'expires_at' => 'Закінчується',
        'is_active' => 'Активний',
        'created_at' => 'Створено',
        'updated_at' => 'Оновлено',
        'feature' => 'Функція',
        'quantity' => 'Кількість',
        'used_at' => 'Використано',
        'days_remaining' => 'Днів залишилось',
        'device_id' => 'ID пристрою',
        'device_name' => 'Назва пристрою',
        'metadata' => 'Метадані',
        'activated_at' => 'Активовано',
        'deactivated_at' => 'Деактивовано',
    ],

    'actions' => [
        'create' => 'Створити',
        'edit' => 'Редагувати',
        'view' => 'Переглянути',
        'delete' => 'Видалити',
        'deactivate' => 'Деактивувати',
    ],

    'filters' => [
        'active' => 'Активні',
        'inactive' => 'Неактивні',
        'deactivated' => 'Деактивовані',
    ],
];
