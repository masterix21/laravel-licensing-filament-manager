<?php

return [
    'form' => [
        'basic_information' => 'Información básica',
        'default_license_settings' => 'Configuración predeterminada de licencia',
        'default_license_settings_description' => 'Valores predeterminados para licencias creadas dentro de este ámbito',
        'key_rotation_settings' => 'Configuración de rotación de claves',
        'key_rotation_settings_description' => 'Configuración automática de rotación de clave de firma',
        'metadata' => 'Metadatos',
    ],

    'fields' => [
        'name' => 'Nombre',
        'slug' => 'Slug',
        'slug_help' => 'Identificador amigable con URL (solo letras minúsculas, números y guiones)',
        'identifier' => 'Identificador',
        'identifier_help' => 'Identificador único para uso de API (p.ej., com.empresa.producto)',
        'description' => 'Descripción',
        'is_active' => 'Activo',
        'default_max_usages' => 'Máximo de usos predeterminado',
        'default_duration_days' => 'Duración predeterminada (días)',
        'default_duration_days_help' => 'Dejar vacío para licencias perpetuas',
        'default_grace_days' => 'Período de gracia predeterminado (días)',
        'key_rotation_days' => 'Intervalo de rotación de clave (días)',
        'key_rotation_days_help' => 'Establecer en 0 para desactivar la rotación automática',
        'last_key_rotation_at' => 'Última rotación de clave',
        'next_key_rotation_at' => 'Próxima rotación programada',
        'licenses_count' => 'Total de licencias',
        'active_licenses_count' => 'Licencias activas',
        'meta' => 'Metadatos adicionales',
    ],

    'actions' => [
        'create' => 'Nuevo ámbito de licencia',
        'rotate_keys' => 'Rotar claves',
        'rotate_keys_modal_heading' => 'Rotar claves de firma',
        'rotate_keys_modal_description' => 'Esto revocará las claves activas actuales y generará nuevas. Esta acción no se puede deshacer.',
        'manual_rotation' => 'Rotación manual',
    ],

    'filters' => [
        'needs_rotation' => 'Necesita rotación de clave',
        'has_licenses' => 'Tiene licencias',
    ],

    'notifications' => [
        'created' => 'Ámbito de licencia creado exitosamente.',
        'updated' => 'Ámbito de licencia actualizado exitosamente.',
    ],

    'relations' => [
        'licenses' => 'Licencias',
        'signing_keys' => 'Claves de firma',
    ],

    'perpetual' => 'Perpetua',
    'rotation_days' => ':days días',
    'disabled' => 'Deshabilitado',
];