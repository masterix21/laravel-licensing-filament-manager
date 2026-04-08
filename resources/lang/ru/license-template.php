<?php

return [
    'fields' => [
        'scope' => 'Область',
        'global' => 'Глобальный',
        'name' => 'Название шаблона',
        'slug' => 'Слаг',
        'tier_level' => 'Уровень тарифа',
        'parent_template' => 'Родительский шаблон',
        'is_active' => 'Активный',
        'supports_trial' => 'Поддерживает пробный период',
        'trial_duration_days' => 'Длительность пробного периода (Дни)',
        'has_grace_period' => 'Есть льготный период',
        'grace_period_days' => 'Льготный период (Дни)',
        'license_duration_days' => 'Длительность лицензии (Дни)',
        'default_max_usages' => 'Макс. использований по умолчанию',
        'days' => ':count дней',
        'base_configuration' => 'Базовая конфигурация',
        'features' => 'Функции',
        'entitlements' => 'Права',
        'meta' => 'Метаданные',
        'licenses_count' => 'Лицензии',
    ],

    'form' => [
        'details' => 'Детали шаблона',
        'durations' => 'Сроки и Периоды',
        'configuration' => 'Конфигурация и функции',
        'metadata' => 'Метаданные',
    ],

    'actions' => [
        'create' => 'Новый шаблон',
    ],

    'filters' => [
        'is_active' => 'Только активные шаблоны',
    ],

    'help' => [
        'license_duration_days' => 'Оставьте пустым для бессрочных лицензий',
        'trial_duration_days' => 'Количество дней пробного периода',
        'grace_period_days' => 'Количество дней льготного периода после истечения',
        'base_configuration' => 'Пары ключ/значение, объединяемые в базовую конфигурацию лицензии (например, max_usages, validity_days, grace_days).',
        'features' => 'Булевы флаги для переключения функций, доступных клиентам.',
        'entitlements' => 'Числовые или строковые права (лимиты, ёмкости и т.д.).',
        'default_max_usages' => 'Максимальное количество одновременных использований на лицензию',
    ],
];
