<?php

return [
    'navigation_group' => 'Lizenzverwaltung',

    'resources' => [
        'license' => [
            'navigation_label' => 'Lizenzen',
            'model_label' => 'Lizenz',
            'plural_model_label' => 'Lizenzen',
        ],
        'license_scope' => [
            'navigation_label' => 'Lizenzbereiche',
            'model_label' => 'Lizenzbereich',
            'plural_model_label' => 'Lizenzbereiche',
        ],
        'license_usage' => [
            'navigation_label' => 'Lizenznutzungen',
            'model_label' => 'Lizenznutzung',
            'plural_model_label' => 'Lizenznutzungen',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Lizenzstatistiken',
            'title' => 'Lizenzstatistiken',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Gesamtlizenzen',
            'total_licenses_description' => 'Alle Lizenzen im System',
            'active_licenses' => 'Aktive Lizenzen',
            'active_licenses_description' => 'Derzeit aktive Lizenzen',
            'total_usages' => 'Gesamtnutzungen',
            'total_usages_description' => 'Lizenznutzungseinträge',
            'expiring_soon' => 'Läuft bald ab',
            'expiring_soon_description' => 'Aktive Lizenzen, die in den nächsten 30 Tagen ablaufen',
            'license_scopes' => 'Lizenzbereiche',
            'license_scopes_description' => 'Verfügbare Lizenztypen',
        ],
        'recent_usages' => [
            'heading' => 'Aktuelle Lizenznutzungen',
        ],
        'expiring_licenses' => [
            'heading' => 'Ablaufende Lizenzen',
            'empty_heading' => 'Keine ablaufenden Lizenzen',
            'empty_description' => 'Es gibt keine Lizenzen, die in den nächsten 30 Tagen ablaufen.',
        ],
    ],

    'fields' => [
        'license_key' => 'Lizenzschlüssel',
        'key' => 'Schlüssel',
        'scope' => 'Bereich',
        'scope_id' => 'Lizenzbereich',
        'template' => 'Lizenzvorlage',
        'licensable_type' => 'Lizenzierbarer Typ',
        'licensable_id' => 'Lizenzierbare ID',
        'expires_at' => 'Läuft ab am',
        'is_active' => 'Ist aktiv',
        'created_at' => 'Erstellt am',
        'updated_at' => 'Aktualisiert am',
        'feature' => 'Funktion',
        'quantity' => 'Menge',
        'used_at' => 'Verwendet am',
        'days_remaining' => 'Verbleibende Tage',
        'device_id' => 'Geräte-ID',
        'device_name' => 'Gerätename',
        'metadata' => 'Metadaten',
        'activated_at' => 'Aktiviert am',
        'deactivated_at' => 'Deaktiviert am',
    ],

    'actions' => [
        'create' => 'Erstellen',
        'edit' => 'Bearbeiten',
        'view' => 'Anzeigen',
        'delete' => 'Löschen',
        'deactivate' => 'Deaktivieren',
    ],

    'filters' => [
        'active' => 'Aktiv',
        'inactive' => 'Inaktiv',
        'deactivated' => 'Deaktiviert',
    ],
];
