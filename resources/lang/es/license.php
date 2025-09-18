<?php

return [
    'form' => [
        'basic_information' => 'Información de licencia',
        'dates_activation' => 'Fechas y activación',
        'usage_statistics' => 'Estadísticas de uso',
        'metadata' => 'Metadatos',
        'security' => 'Seguridad',
    ],

    'fields' => [
        'id' => 'ID de licencia',
        'key_hash' => 'Hash de clave de licencia',
        'status' => 'Estado',
        'license_scope' => 'Ámbito de licencia',
        'licensable' => 'Entidad licenciada',
        'template' => 'Plantilla de licencia',
        'max_usages' => 'Usos máximos',
        'usages' => 'Usos',
        'remaining_usages' => 'Usos restantes',
        'usage_percentage' => '% de uso',
        'duration_days' => 'Duración (días)',
        'activated_at' => 'Activado el',
        'expires_at' => 'Expira el',
        'meta' => 'Metadatos',
        'key_visibility' => 'Recuperación de clave',
    ],

    'actions' => [
        'create' => 'Nueva licencia',
        'activate' => 'Activar',
        'suspend' => 'Suspender',
        'renew' => 'Renovar',
        'show_key' => 'Mostrar clave de licencia',
        'regenerate_key' => 'Regenerar clave de licencia',
    ],

    'filters' => [
        'expired' => 'Expirado',
        'expiring_soon' => 'Expirando pronto',
        'over_limit' => 'Sobre el límite de uso',
    ],

    'help' => [
        'expires_at' => 'Dejar vacío para calcular automáticamente basado en valores predeterminados de plantilla o configuración de ámbito.',
        'template' => 'Las plantillas controlan los usos máximos, validez, características y derechos.',
    ],

    'notifications' => [
        'created' => 'Licencia creada exitosamente.',
        'updated' => 'Licencia actualizada exitosamente.',
        'activated' => 'Licencia activada exitosamente.',
        'suspended' => 'Licencia suspendida exitosamente.',
        'renewed' => 'Licencia renovada exitosamente.',
        'key_generated' => 'Clave de licencia generada.',
        'key_retrieved' => 'Clave de licencia lista.',
        'key_regenerated' => 'Clave de licencia regenerada.',
        'key_unavailable' => 'La clave de licencia no puede ser recuperada porque la recuperación está deshabilitada.',
        'key_value' => 'Clave de licencia: :key',
    ],

    'relations' => [
        'usages' => 'Usos',
        'renewals' => 'Renovaciones',
        'transfers' => 'Transferencias',
    ],

    'security' => [
        'key_not_yet_generated' => 'La clave de licencia será generada después de guardar.',
        'key_retrievable' => 'La recuperación de clave cifrada está habilitada.',
        'key_not_retrievable' => 'La recuperación de clave está deshabilitada en la configuración de licencias.',
    ],
];