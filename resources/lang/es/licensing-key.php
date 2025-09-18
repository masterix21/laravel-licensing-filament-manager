<?php

return [
    'fields' => [
        'kid' => 'ID de clave',
        'status' => 'Estado',
        'algorithm' => 'Algoritmo',
        'valid_from' => 'Válido desde',
        'valid_until' => 'Válido hasta',
        'revoked_at' => 'Revocado el',
        'revocation_reason' => 'Razón de revocación',
    ],

    'actions' => [
        'generate_new' => 'Generar nueva clave',
        'generate_new_modal_heading' => 'Generar nueva clave de firma',
        'generate_new_modal_description' => 'Esto creará una nueva clave de firma para este ámbito.',
        'revoke' => 'Revocar clave',
        'revoke_modal_heading' => 'Revocar clave de firma',
        'revoke_modal_description' => 'Esto revocará permanentemente esta clave de firma. Esta acción no se puede deshacer.',
        'revoke_selected' => 'Revocar claves seleccionadas',
    ],

    'filters' => [
        'expired' => 'Claves expiradas',
    ],

    'notifications' => [
        'generated' => 'Clave de firma generada exitosamente.',
        'generated_body' => 'Nueva clave de firma emitida: :kid',
        'revoked' => 'Clave de firma revocada.',
        'failed' => 'No se puede generar la clave de firma.',
    ],
];
