<?php

return [
    'fields' => [
        'name' => 'Nombre de plantilla',
        'slug' => 'Slug',
        'tier_level' => 'Nivel de categoría',
        'parent_template' => 'Plantilla principal',
        'is_active' => 'Activa',
        'license_duration_days' => 'Duración',
        'supports_trial' => 'Prueba',
        'trial_duration_days' => 'Duración de prueba (días)',
        'has_grace_period' => 'Período de gracia',
        'grace_period_days' => 'Período de gracia (días)',
        'base_configuration' => 'Configuración base',
        'features' => 'Características',
        'entitlements' => 'Derechos',
        'meta' => 'Metadatos',
    ],

    'form' => [
        'details' => 'Detalles de plantilla',
        'durations' => 'Duraciones y períodos',
        'configuration' => 'Configuración y características',
        'metadata' => 'Metadatos',
    ],

    'actions' => [
        'create' => 'Nueva plantilla',
    ],

    'filters' => [
        'is_active' => 'Solo plantillas activas',
    ],

    'help' => [
        'base_configuration' => 'Pares clave/valor fusionados en la configuración base de la licencia (p.ej., max_usages, validity_days).',
        'features' => 'Indicadores booleanos para activar/desactivar características expuestas a los clientes.',
        'entitlements' => 'Derechos numéricos o de cadena (límites, capacidades, etc.).',
        'license_duration_days' => 'Número de días de validez de la licencia. Dejar vacío para duración ilimitada.',
        'trial_duration_days' => 'Número de días para el período de prueba.',
        'grace_period_days' => 'Número de días después de la expiración antes de que la licencia se desactive completamente.',
    ],

    'days' => ':count días',
];