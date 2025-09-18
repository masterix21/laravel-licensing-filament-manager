<?php

return [
    'fields' => [
        'kid' => 'ID ключа',
        'status' => 'Статус',
        'algorithm' => 'Алгоритм',
        'valid_from' => 'Действителен с',
        'valid_until' => 'Действителен до',
        'revoked_at' => 'Отозван',
        'revocation_reason' => 'Причина отзыва',
    ],


    'actions' => [
        'generate_new' => 'Сгенерировать новый ключ',
        'generate_new_modal_heading' => 'Генерация нового ключа подписи',
        'generate_new_modal_description' => 'Это создаст новый ключ подписи для этой области.',
        'revoke' => 'Отозвать ключ',
        'revoke_modal_heading' => 'Отзыв ключа подписи',
        'revoke_modal_description' => 'Это навсегда отзовёт этот ключ подписи. Это действие нельзя отменить.',
        'revoke_selected' => 'Отозвать выбранные ключи',
    ],

    'filters' => [
        'expired' => 'Истёкшие ключи',
    ],

    'notifications' => [
        'generated' => 'Ключ подписи успешно сгенерирован.',
        'generated_body' => 'Выдан новый ключ подписи: :kid',
        'revoked' => 'Ключ подписи отозван.',
        'failed' => 'Невозможно сгенерировать ключ подписи.',
    ],
];