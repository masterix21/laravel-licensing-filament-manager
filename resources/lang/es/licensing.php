<?php

return [
    'navigation_group' => 'Gestión de licencias',

    'resources' => [
        'license' => [
            'navigation_label' => 'Licencias',
            'model_label' => 'Licencia',
            'plural_model_label' => 'Licencias',
        ],
        'license_scope' => [
            'navigation_label' => 'Ámbitos de licencia',
            'model_label' => 'Ámbito de licencia',
            'plural_model_label' => 'Ámbitos de licencia',
        ],
        'license_usage' => [
            'navigation_label' => 'Usos de licencia',
            'model_label' => 'Uso de licencia',
            'plural_model_label' => 'Usos de licencia',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Estadísticas de licencias',
            'title' => 'Estadísticas de licencias',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Total de licencias',
            'total_licenses_description' => 'Todas las licencias en el sistema',
            'active_licenses' => 'Licencias activas',
            'active_licenses_description' => 'Licencias actualmente activas',
            'total_usages' => 'Total de usos',
            'total_usages_description' => 'Registros de uso de licencias',
            'expiring_soon' => 'Expirando pronto',
            'expiring_soon_description' => 'Licencias activas expirando en los próximos 30 días',
            'license_scopes' => 'Ámbitos de licencia',
            'license_scopes_description' => 'Tipos de licencia disponibles',
        ],
        'recent_usages' => [
            'heading' => 'Usos recientes de licencia',
        ],
        'expiring_licenses' => [
            'heading' => 'Licencias expirando',
            'empty_heading' => 'Sin licencias expirando',
            'empty_description' => 'No hay licencias expirando en los próximos 30 días.',
        ],
    ],

    'fields' => [
        'license_key' => 'Clave de licencia',
        'key' => 'Clave',
        'scope' => 'Ámbito',
        'scope_id' => 'Ámbito de licencia',
        'template' => 'Plantilla de licencia',
        'licensable_type' => 'Tipo licenciable',
        'licensable_id' => 'ID licenciable',
        'expires_at' => 'Expira el',
        'is_active' => 'Está activo',
        'created_at' => 'Creado el',
        'updated_at' => 'Actualizado el',
        'feature' => 'Característica',
        'quantity' => 'Cantidad',
        'used_at' => 'Usado el',
        'days_remaining' => 'Días restantes',
        'device_id' => 'ID de dispositivo',
        'device_name' => 'Nombre de dispositivo',
        'metadata' => 'Metadatos',
        'activated_at' => 'Activado el',
        'deactivated_at' => 'Desactivado el',
    ],

    'actions' => [
        'create' => 'Crear',
        'edit' => 'Editar',
        'view' => 'Ver',
        'delete' => 'Eliminar',
        'deactivate' => 'Desactivar',
    ],

    'filters' => [
        'active' => 'Activo',
        'inactive' => 'Inactivo',
        'deactivated' => 'Desactivado',
    ],
];
