<?php

return [
    'fields' => [
        'scope' => 'Portée',
        'global' => 'Global',
        'name' => 'Nom du modèle',
        'slug' => 'Slug',
        'tier_level' => 'Niveau de niveau',
        'parent_template' => 'Modèle parent',
        'is_active' => 'Actif',
        'supports_trial' => 'Supporte l\'essai',
        'trial_duration_days' => 'Durée d\'essai (Jours)',
        'has_grace_period' => 'A une période de grâce',
        'grace_period_days' => 'Période de grâce (Jours)',
        'license_duration_days' => 'Durée de licence (Jours)',
        'default_max_usages' => 'Utilisations Max. par Défaut',
        'days' => ':count jours',
        'base_configuration' => 'Configuration de base',
        'features' => 'Fonctionnalités',
        'entitlements' => 'Droits',
        'meta' => 'Métadonnées',
        'licenses_count' => 'Licences',
    ],

    'form' => [
        'details' => 'Détails du modèle',
        'durations' => 'Durées et Périodes',
        'configuration' => 'Configuration et fonctionnalités',
        'metadata' => 'Métadonnées',
    ],

    'actions' => [
        'create' => 'Nouveau modèle',
    ],

    'filters' => [
        'is_active' => 'Seulement les modèles actifs',
    ],

    'help' => [
        'license_duration_days' => 'Laisser vide pour les licences perpétuelles',
        'trial_duration_days' => 'Nombre de jours pour la période d\'essai',
        'grace_period_days' => 'Nombre de jours pour la période de grâce après expiration',
        'base_configuration' => 'Paires clé/valeur fusionnées dans la configuration de base de la licence (ex: max_usages, validity_days, grace_days).',
        'features' => 'Indicateurs booléens pour les commutateurs de fonctionnalités exposés aux clients.',
        'entitlements' => 'Droits numériques ou textuels (limites, capacités, etc.).',
        'default_max_usages' => 'Nombre maximum d\'utilisations simultanées par licence',
    ],
];
