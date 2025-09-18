<?php

return [
    'form' => [
        'basic_information' => 'Informations de licence',
        'dates_activation' => 'Dates et activation',
        'usage_statistics' => 'Statistiques d\'utilisation',
        'metadata' => 'Métadonnées',
        'security' => 'Sécurité',
    ],

    'fields' => [
        'id' => 'ID de licence',
        'key_hash' => 'Hash de clé de licence',
        'status' => 'Statut',
        'license_scope' => 'Périmètre de licence',
        'licensable' => 'Entité sous licence',
        'template' => 'Modèle de licence',
        'max_usages' => 'Utilisations max',
        'usages' => 'Utilisations',
        'remaining_usages' => 'Utilisations restantes',
        'usage_percentage' => '% d\'utilisation',
        'duration_days' => 'Durée (Jours)',
        'activated_at' => 'Activé le',
        'expires_at' => 'Expire le',
        'meta' => 'Métadonnées',
        'key_visibility' => 'Récupération de clé',
    ],

    'actions' => [
        'create' => 'Nouvelle licence',
        'activate' => 'Activer',
        'suspend' => 'Suspendre',
        'renew' => 'Renouveler',
        'show_key' => 'Afficher la clé de licence',
        'regenerate_key' => 'Régénérer la clé de licence',
    ],

    'filters' => [
        'expired' => 'Expirée',
        'expiring_soon' => 'Expire bientôt',
        'over_limit' => 'Au-dessus de la limite d\'usage',
    ],

    'help' => [
        'expires_at' => 'Laisser vide pour auto-calculer basé sur les défauts du modèle ou la configuration du périmètre.',
        'template' => 'Les modèles contrôlent les utilisations max, la validité, les fonctionnalités et les droits.',
    ],

    'notifications' => [
        'created' => 'Licence créée avec succès.',
        'updated' => 'Licence mise à jour avec succès.',
        'activated' => 'Licence activée avec succès.',
        'suspended' => 'Licence suspendue avec succès.',
        'renewed' => 'Licence renouvelée avec succès.',
        'key_generated' => 'Clé de licence générée.',
        'key_retrieved' => 'Clé de licence prête.',
        'key_regenerated' => 'Clé de licence régénérée.',
        'key_unavailable' => 'La clé de licence ne peut pas être récupérée car la récupération est désactivée.',
        'key_value' => 'Clé de licence : :key',
    ],

    'relations' => [
        'usages' => 'Utilisations',
        'renewals' => 'Renouvellements',
        'transfers' => 'Transferts',
    ],

    'security' => [
        'key_not_yet_generated' => 'La clé de licence sera générée après sauvegarde.',
        'key_retrievable' => 'La récupération de clé chiffrée est activée.',
        'key_not_retrievable' => 'La récupération de clé est désactivée dans la configuration de licence.',
    ],
];