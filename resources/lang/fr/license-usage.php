<?php

return [
    'fields' => [
        'usage_fingerprint' => 'Empreinte d\'utilisation',
        'status' => 'Statut',
        'client_type' => 'Type de client',
        'name' => 'Nom',
        'ip' => 'Adresse IP',
        'user_agent' => 'Agent utilisateur',
        'registered_at' => 'Enregistré le',
        'last_seen_at' => 'Dernière connexion le',
        'revoked_at' => 'Révoqué le',
    ],

    'actions' => [
        'revoke' => 'Révoquer l\'utilisation',
        'revoke_selected' => 'Révoquer la sélection',
        'heartbeat' => 'Mettre à jour le battement de cœur',
    ],

    'filters' => [
        'inactive' => 'Inactif (7+ jours)',
    ],

    'help' => [
        'usage_fingerprint' => 'Généralement un hash d\'identifiants d\'appareil ou d\'installation.',
    ],

    'notifications' => [
        'revoked' => 'Utilisation révoquée avec succès.',
    ],
];