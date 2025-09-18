<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Huella de uso',
        'status' => 'Estado',
        'client_type' => 'Tipo de cliente',
        'name' => 'Nombre',
        'ip' => 'Dirección IP',
        'user_agent' => 'Agente de usuario',
        'registered_at' => 'Registrado el',
        'last_seen_at' => 'Visto por última vez',
        'revoked_at' => 'Revocado el',
    ],

    'actions' => [
        'revoke' => 'Revocar uso',
        'revoke_selected' => 'Revocar seleccionados',
        'heartbeat' => 'Actualizar latido',
    ],

    'filters' => [
        'inactive' => 'Inactivo (7+ días)',
    ],

    'help' => [
        'usage_fingerprint' => 'Típicamente un hash de identificadores de dispositivo o instalación.',
    ],

    'notifications' => [
        'revoked' => 'Uso revocado exitosamente.',
    ],
];