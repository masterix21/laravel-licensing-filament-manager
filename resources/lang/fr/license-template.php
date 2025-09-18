<?php

return [
    'fields' => [
        'name' => 'Nom du modèle',
        'slug' => 'Slug',
        'tier_level' => 'Niveau de niveau',
        'parent_template' => 'Modèle parent',
        'is_active' => 'Actif',
        'license_duration_days' => 'Durée',
        'supports_trial' => 'Essai',
        'trial_duration_days' => 'Durée d\'essai (jours)',
        'has_grace_period' => 'Période de grâce',
        'grace_period_days' => 'Période de grâce (jours)',
        'base_configuration' => 'Configuration de base',
        'features' => 'Fonctionnalités',
        'entitlements' => 'Droits',
        'meta' => 'Métadonnées',
    ],

    'form' => [
        'details' => 'Détails du modèle',
        'durations' => 'Durées et périodes',
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
        'base_configuration' => 'Paires clé/valeur fusionnées dans la configuration de base de la licence (ex: max_usages, validity_days).',
        'features' => 'Indicateurs booléens pour les commutateurs de fonctionnalités exposés aux clients.',
        'entitlements' => 'Droits numériques ou textuels (limites, capacités, etc.).',
        'license_duration_days' => 'Nombre de jours pendant lesquels la licence est valide. Laisser vide pour une durée illimitée.',
        'trial_duration_days' => 'Nombre de jours pour la période d\'essai.',
        'grace_period_days' => 'Nombre de jours après expiration avant que la licence soit complètement désactivée.',
    ],

    'days' => ':count jours',
];