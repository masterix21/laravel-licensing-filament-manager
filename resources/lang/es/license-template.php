<?php

return [
    'fields' => [
        'scope' => 'Ámbito',
        'global' => 'Global',
        'name' => 'Nombre de plantilla',
        'slug' => 'Slug',
        'tier_level' => 'Nivel de categoría',
        'parent_template' => 'Plantilla principal',
        'is_active' => 'Activa',
        'supports_trial' => 'Soporta prueba',
        'trial_duration_days' => 'Duración de prueba (Días)',
        'has_grace_period' => 'Tiene período de gracia',
        'grace_period_days' => 'Período de gracia (Días)',
        'license_duration_days' => 'Duración de licencia (Días)',
        'default_max_usages' => 'Usos Máximos Predeterminados',
        'days' => ':count días',
        'base_configuration' => 'Configuración base',
        'features' => 'Características',
        'entitlements' => 'Derechos',
        'meta' => 'Metadatos',
        'licenses_count' => 'Licencias',
    ],

    'form' => [
        'details' => 'Detalles de plantilla',
        'durations' => 'Duraciones y Períodos',
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
        'license_duration_days' => 'Dejar vacío para licencias perpetuas',
        'trial_duration_days' => 'Número de días para el período de prueba',
        'grace_period_days' => 'Número de días para el período de gracia después de la expiración',
        'base_configuration' => 'Pares clave/valor fusionados en la configuración base de la licencia (p.ej., max_usages, validity_days, grace_days).',
        'features' => 'Indicadores booleanos para activar/desactivar características expuestas a los clientes.',
        'entitlements' => 'Derechos numéricos o de cadena (límites, capacidades, etc.).',
        'default_max_usages' => 'Número máximo de usos simultáneos por licencia',
    ],
];
