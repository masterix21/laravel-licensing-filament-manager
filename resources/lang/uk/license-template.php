<?php

return [
    'fields' => [
        'scope' => 'Область',
        'global' => 'Глобальний',
        'name' => 'Назва шаблону',
        'slug' => 'Slug',
        'tier_level' => 'Рівень тарифу',
        'parent_template' => 'Батьківський шаблон',
        'is_active' => 'Активний',
        'supports_trial' => 'Підтримує пробний період',
        'trial_duration_days' => 'Тривалість пробного періоду (Дні)',
        'has_grace_period' => 'Має пільговий період',
        'grace_period_days' => 'Пільговий період (Дні)',
        'license_duration_days' => 'Тривалість ліцензії (Дні)',
        'default_max_usages' => 'Макс. використань за замовчуванням',
        'days' => ':count днів',
        'base_configuration' => 'Базова конфігурація',
        'features' => 'Функції',
        'entitlements' => 'Права',
        'meta' => 'Метадані',
        'licenses_count' => 'Ліцензії',
    ],

    'form' => [
        'details' => 'Деталі шаблону',
        'durations' => 'Терміни та Періоди',
        'configuration' => 'Конфігурація та функції',
        'metadata' => 'Метадані',
    ],

    'actions' => [
        'create' => 'Новий шаблон',
    ],

    'filters' => [
        'is_active' => 'Лише активні шаблони',
    ],

    'help' => [
        'license_duration_days' => 'Залиште порожнім для безстрокових ліцензій',
        'trial_duration_days' => 'Кількість днів пробного періоду',
        'grace_period_days' => 'Кількість днів пільгового періоду після закінчення терміну',
        'base_configuration' => 'Пари ключ/значення, що обʼєднуються з базовою конфігурацією ліцензії (наприклад, max_usages, validity_days, grace_days).',
        'features' => 'Булеві прапорці для перемикання функцій, доступних клієнтам.',
        'entitlements' => 'Числові або текстові права (ліміти, ємності тощо).',
        'default_max_usages' => 'Максимальна кількість одночасних використань на ліцензію',
    ],
];
