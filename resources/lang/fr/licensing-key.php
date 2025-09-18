<?php

return [
    'fields' => [
        'kid' => 'ID de clé',
        'status' => 'Statut',
        'algorithm' => 'Algorithme',
        'valid_from' => 'Valide depuis',
        'valid_until' => 'Valide jusqu\'à',
        'revoked_at' => 'Révoqué le',
        'revocation_reason' => 'Raison de révocation',
    ],


    'actions' => [
        'generate_new' => 'Générer une nouvelle clé',
        'generate_new_modal_heading' => 'Générer une nouvelle clé de signature',
        'generate_new_modal_description' => 'Cela créera une nouvelle clé de signature pour ce périmètre.',
        'revoke' => 'Révoquer la clé',
        'revoke_modal_heading' => 'Révoquer la clé de signature',
        'revoke_modal_description' => 'Cela révoquera définitivement cette clé de signature. Cette action ne peut pas être annulée.',
        'revoke_selected' => 'Révoquer les clés sélectionnées',
    ],

    'filters' => [
        'expired' => 'Clés expirées',
    ],

    'notifications' => [
        'generated' => 'Clé de signature générée avec succès.',
        'generated_body' => 'Nouvelle clé de signature émise : :kid',
        'revoked' => 'Clé de signature révoquée.',
        'failed' => 'Impossible de générer la clé de signature.',
    ],
];