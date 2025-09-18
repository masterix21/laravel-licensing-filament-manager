<?php

return [
    'navigation_group' => 'Gestion des licences',

    'resources' => [
        'license' => [
            'navigation_label' => 'Licences',
            'model_label' => 'Licence',
            'plural_model_label' => 'Licences',
        ],
        'license_scope' => [
            'navigation_label' => 'Périmètres de licence',
            'model_label' => 'Périmètre de licence',
            'plural_model_label' => 'Périmètres de licence',
        ],
        'license_usage' => [
            'navigation_label' => 'Utilisations de licence',
            'model_label' => 'Utilisation de licence',
            'plural_model_label' => 'Utilisations de licence',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Statistiques de licence',
            'title' => 'Statistiques de licence',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Total des licences',
            'total_licenses_description' => 'Toutes les licences dans le système',
            'active_licenses' => 'Licences actives',
            'active_licenses_description' => 'Licences actuellement actives',
            'total_usages' => 'Total des utilisations',
            'total_usages_description' => 'Enregistrements d\'utilisation de licence',
            'expiring_soon' => 'Expire bientôt',
            'expiring_soon_description' => 'Licences actives expirant dans les 30 prochains jours',
            'license_scopes' => 'Périmètres de licence',
            'license_scopes_description' => 'Types de licence disponibles',
        ],
        'recent_usages' => [
            'heading' => 'Utilisations récentes de licence',
        ],
        'expiring_licenses' => [
            'heading' => 'Licences expirant',
            'empty_heading' => 'Aucune licence expirant',
            'empty_description' => 'Il n\'y a aucune licence expirant dans les 30 prochains jours.',
        ],
    ],

    'fields' => [
        'license_key' => 'Clé de licence',
        'key' => 'Clé',
        'scope' => 'Périmètre',
        'scope_id' => 'Périmètre de licence',
        'template' => 'Modèle de licence',
        'licensable_type' => 'Type sous licence',
        'licensable_id' => 'ID sous licence',
        'expires_at' => 'Expire le',
        'is_active' => 'Est actif',
        'created_at' => 'Créé le',
        'updated_at' => 'Mis à jour le',
        'feature' => 'Fonctionnalité',
        'quantity' => 'Quantité',
        'used_at' => 'Utilisé le',
        'days_remaining' => 'Jours restants',
        'device_id' => 'ID d\'appareil',
        'device_name' => 'Nom d\'appareil',
        'metadata' => 'Métadonnées',
        'activated_at' => 'Activé le',
        'deactivated_at' => 'Désactivé le',
    ],

    'actions' => [
        'create' => 'Créer',
        'edit' => 'Modifier',
        'view' => 'Voir',
        'delete' => 'Supprimer',
        'deactivate' => 'Désactiver',
    ],

    'filters' => [
        'active' => 'Actif',
        'inactive' => 'Inactif',
        'deactivated' => 'Désactivé',
    ],
];
