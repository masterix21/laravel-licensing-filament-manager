<?php

return [
    'navigation_group' => 'Licentiebeheer',

    'resources' => [
        'license' => [
            'navigation_label' => 'Licenties',
            'model_label' => 'Licentie',
            'plural_model_label' => 'Licenties',
        ],
        'license_template' => [
            'navigation_label' => 'Licentiesjablonen',
            'model_label' => 'Licentiesjabloon',
            'plural_model_label' => 'Licentiesjablonen',
        ],
        'license_usage' => [
            'navigation_label' => 'Licentiegebruik',
            'model_label' => 'Licentiegebruik',
            'plural_model_label' => 'Licentiegebruik',
        ],
        'license_scope' => [
            'navigation_label' => 'Licentiebereiken',
            'model_label' => 'Licentiebereik',
            'plural_model_label' => 'Licentiebereiken',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Licentiestatistieken',
            'title' => 'Licentiestatistieken',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Totaal licenties',
            'total_licenses_description' => 'Alle licenties in het systeem',
            'active_licenses' => 'Actieve licenties',
            'active_licenses_description' => 'Momenteel actieve licenties',
            'total_usages' => 'Totaal gebruik',
            'total_usages_description' => 'Licentiegebruiksrecords',
            'expiring_soon' => 'Verloopt binnenkort',
            'expiring_soon_description' => 'Actieve licenties die binnen 30 dagen verlopen',
            'license_templates' => 'Licentiesjablonen',
            'license_templates_description' => 'Actieve licentiesjablonen',
        ],
        'recent_usages' => [
            'heading' => 'Recent licentiegebruik',
        ],
        'expiring_licenses' => [
            'heading' => 'Verlopende licenties',
            'empty_heading' => 'Geen verlopende licenties',
            'empty_description' => 'Er zijn geen licenties die binnen 30 dagen verlopen.',
        ],
    ],

    'fields' => [
        'license_key' => 'Licentiesleutel',
        'key' => 'Sleutel',
        'scope' => 'Bereik',
        'scope_id' => 'Licentiebereik',
        'template' => 'Licentiesjabloon',
        'licensable_type' => 'Licentieerbaar type',
        'licensable_id' => 'Licentieerbaar ID',
        'expires_at' => 'Verloopt op',
        'is_active' => 'Actief',
        'created_at' => 'Aangemaakt op',
        'updated_at' => 'Bijgewerkt op',
        'feature' => 'Functie',
        'quantity' => 'Aantal',
        'used_at' => 'Gebruikt op',
        'days_remaining' => 'Dagen resterend',
        'device_id' => 'Apparaat ID',
        'device_name' => 'Apparaatnaam',
        'metadata' => 'Metadata',
        'activated_at' => 'Geactiveerd op',
        'deactivated_at' => 'Gedeactiveerd op',
    ],

    'actions' => [
        'create' => 'Aanmaken',
        'edit' => 'Bewerken',
        'view' => 'Bekijken',
        'delete' => 'Verwijderen',
        'deactivate' => 'Deactiveren',
    ],

    'filters' => [
        'active' => 'Actief',
        'inactive' => 'Inactief',
        'deactivated' => 'Gedeactiveerd',
    ],
];
