<?php

return [
    'fields' => [
        'scope' => 'Bereich',
        'global' => 'Global',
        'name' => 'Vorlagenname',
        'slug' => 'Slug',
        'tier_level' => 'Stufe',
        'parent_template' => 'Übergeordnete Vorlage',
        'is_active' => 'Aktiv',
        'supports_trial' => 'Unterstützt Testversion',
        'trial_duration_days' => 'Testdauer (Tage)',
        'has_grace_period' => 'Hat Kulanzzeit',
        'grace_period_days' => 'Kulanzzeit (Tage)',
        'license_duration_days' => 'Lizenzdauer (Tage)',
        'default_max_usages' => 'Standard Max. Nutzungen',
        'days' => ':count Tage',
        'base_configuration' => 'Basiskonfiguration',
        'features' => 'Funktionen',
        'entitlements' => 'Berechtigungen',
        'meta' => 'Metadaten',
        'licenses_count' => 'Lizenzen',
    ],

    'form' => [
        'details' => 'Vorlagendetails',
        'durations' => 'Laufzeiten & Zeiträume',
        'configuration' => 'Konfiguration & Funktionen',
        'metadata' => 'Metadaten',
    ],

    'actions' => [
        'create' => 'Neue Vorlage',
    ],

    'filters' => [
        'is_active' => 'Nur aktive Vorlagen',
    ],

    'help' => [
        'license_duration_days' => 'Leer lassen für unbefristete Lizenzen',
        'trial_duration_days' => 'Anzahl der Tage für den Testzeitraum',
        'grace_period_days' => 'Anzahl der Tage für die Kulanzzeit nach Ablauf',
        'base_configuration' => 'Schlüssel/Wert-Paare, die in die Lizenz-Basiskonfiguration übernommen werden (z.B. max_usages, validity_days, grace_days).',
        'features' => 'Boolean-Flags für Funktionsumschalter, die Clients zur Verfügung stehen.',
        'entitlements' => 'Numerische oder String-Berechtigungen (Limits, Kapazitäten, etc.).',
        'default_max_usages' => 'Maximale Anzahl gleichzeitiger Nutzungen pro Lizenz',
    ],
];
