<?php

return [
    'fields' => [
        'name' => 'Vorlagenname',
        'slug' => 'Slug',
        'tier_level' => 'Stufe',
        'parent_template' => 'Übergeordnete Vorlage',
        'is_active' => 'Aktiv',
        'license_duration_days' => 'Dauer',
        'supports_trial' => 'Testversion',
        'trial_duration_days' => 'Testdauer (Tage)',
        'has_grace_period' => 'Nachfrist',
        'grace_period_days' => 'Nachfrist (Tage)',
        'base_configuration' => 'Basiskonfiguration',
        'features' => 'Funktionen',
        'entitlements' => 'Berechtigungen',
        'meta' => 'Metadaten',
    ],

    'form' => [
        'details' => 'Vorlagendetails',
        'durations' => 'Dauer & Fristen',
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
        'base_configuration' => 'Schlüssel/Wert-Paare, die in die Lizenz-Basiskonfiguration übernommen werden (z.B. max_usages, validity_days).',
        'features' => 'Boolean-Flags für Funktionsumschalter, die Clients zur Verfügung stehen.',
        'entitlements' => 'Numerische oder String-Berechtigungen (Limits, Kapazitäten, etc.).',
        'license_duration_days' => 'Anzahl der Tage, für die die Lizenz gültig ist. Leer lassen für unbegrenzte Dauer.',
        'trial_duration_days' => 'Anzahl der Tage für die Testperiode.',
        'grace_period_days' => 'Anzahl der Tage nach Ablauf, bevor die Lizenz vollständig deaktiviert wird.',
    ],

    'days' => ':count Tage',
];
