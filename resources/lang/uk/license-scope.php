<?php

return [
    'form' => [
        'basic_information' => 'Основна інформація',
        'default_license_settings' => 'Налаштування ліцензій за замовчуванням',
        'default_license_settings_description' => 'Значення за замовчуванням для ліцензій, створених у цій області',
        'key_rotation_settings' => 'Налаштування ротації ключів',
        'key_rotation_settings_description' => 'Конфігурація автоматичної ротації ключів підпису',
        'metadata' => 'Метадані',
    ],

    'fields' => [
        'name' => 'Назва',
        'slug' => 'Slug',
        'slug_help' => 'URL-сумісний ідентифікатор (лише малі літери, цифри та дефіси)',
        'identifier' => 'Ідентифікатор',
        'identifier_help' => 'Унікальний ідентифікатор для API (наприклад, com.company.product)',
        'description' => 'Опис',
        'is_active' => 'Активний',
        'default_max_usages' => 'Максимум використань за замовчуванням',
        'default_duration_days' => 'Тривалість за замовчуванням',
        'default_duration_days_help' => 'Залиште порожнім для безстрокових ліцензій',
        'default_grace_days' => 'Пільговий період за замовчуванням',
        'key_rotation_days' => 'Інтервал ротації ключів',
        'key_rotation_days_help' => 'Встановіть 0 для вимкнення автоматичної ротації',
        'last_key_rotation_at' => 'Остання ротація ключів',
        'next_key_rotation_at' => 'Наступна запланована ротація',
        'licenses_count' => 'Усього ліцензій',
        'active_licenses_count' => 'Активні ліцензії',
        'meta' => 'Додаткові метадані',
    ],

    'actions' => [
        'create' => 'Нова область ліцензії',
        'rotate_keys' => 'Ротація ключів',
        'rotate_keys_modal_heading' => 'Ротація ключів підпису',
        'rotate_keys_modal_description' => 'Поточні активні ключі буде відкликано та згенеровано нові. Цю дію неможливо скасувати.',
        'manual_rotation' => 'Ручна ротація',
    ],

    'filters' => [
        'needs_rotation' => 'Потребує ротації ключів',
        'has_licenses' => 'Має ліцензії',
    ],

    'notifications' => [
        'created' => 'Область ліцензії успішно створено.',
        'updated' => 'Область ліцензії успішно оновлено.',
    ],

    'relations' => [
        'licenses' => 'Ліцензії',
        'signing_keys' => 'Ключі підпису',
    ],

    'perpetual' => 'Безстрокова',
    'unlimited' => 'Без обмежень',
    'seats' => 'місць',
    'days' => 'днів',
    'none' => 'Немає',
    'rotation_days' => ':days днів',
    'disabled' => 'Вимкнено',
];
