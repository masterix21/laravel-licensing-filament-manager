<?php

return [
    'form' => [
        'basic_information' => 'Informations de base',
        'default_license_settings' => 'Paramètres de licence par défaut',
        'default_license_settings_description' => 'Valeurs par défaut pour les licences créées dans ce périmètre',
        'key_rotation_settings' => 'Paramètres de rotation des clés',
        'key_rotation_settings_description' => 'Configuration de la rotation automatique des clés de signature',
        'metadata' => 'Métadonnées',
    ],

    'fields' => [
        'name' => 'Nom',
        'slug' => 'Slug',
        'slug_help' => 'Identifiant convivial pour URL (lettres minuscules, chiffres et tirets uniquement)',
        'identifier' => 'Identifiant',
        'identifier_help' => 'Identifiant unique pour l\'utilisation API (ex: com.entreprise.produit)',
        'description' => 'Description',
        'is_active' => 'Actif',
        'default_max_usages' => 'Utilisations max par défaut',
        'default_duration_days' => 'Durée par défaut (Jours)',
        'default_duration_days_help' => 'Laisser vide pour des licences perpétuelles',
        'default_grace_days' => 'Période de grâce par défaut (Jours)',
        'key_rotation_days' => 'Intervalle de rotation des clés (Jours)',
        'key_rotation_days_help' => 'Définir à 0 pour désactiver la rotation automatique',
        'last_key_rotation_at' => 'Dernière rotation des clés',
        'next_key_rotation_at' => 'Prochaine rotation programmée',
        'licenses_count' => 'Total des licences',
        'active_licenses_count' => 'Licences actives',
        'meta' => 'Métadonnées supplémentaires',
    ],

    'actions' => [
        'create' => 'Nouveau périmètre de licence',
        'rotate_keys' => 'Rotation des clés',
        'rotate_keys_modal_heading' => 'Rotation des clés de signature',
        'rotate_keys_modal_description' => 'Cela révoquera les clés actives actuelles et en générera de nouvelles. Cette action ne peut pas être annulée.',
        'manual_rotation' => 'Rotation manuelle',
    ],

    'filters' => [
        'needs_rotation' => 'Nécessite une rotation des clés',
        'has_licenses' => 'Possède des licences',
    ],

    'notifications' => [
        'created' => 'Périmètre de licence créé avec succès.',
        'updated' => 'Périmètre de licence mis à jour avec succès.',
    ],

    'relations' => [
        'licenses' => 'Licences',
        'signing_keys' => 'Clés de signature',
    ],

    'perpetual' => 'Perpétuelle',
    'rotation_days' => ':days jours',
    'disabled' => 'Désactivé',
];