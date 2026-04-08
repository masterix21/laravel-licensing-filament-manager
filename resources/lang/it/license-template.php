<?php

return [
    'fields' => [
        'scope' => 'Ambito',
        'global' => 'Globale',
        'name' => 'Nome template',
        'slug' => 'Slug',
        'tier_level' => 'Livello tier',
        'parent_template' => 'Template genitore',
        'is_active' => 'Attivo',
        'supports_trial' => 'Supporta prova',
        'trial_duration_days' => 'Durata prova (Giorni)',
        'has_grace_period' => 'Ha periodo di grazia',
        'grace_period_days' => 'Periodo di grazia (Giorni)',
        'license_duration_days' => 'Durata licenza (Giorni)',
        'default_max_usages' => 'Utilizzi Massimi Predefiniti',
        'days' => ':count giorni',
        'base_configuration' => 'Configurazione base',
        'features' => 'Funzionalità',
        'entitlements' => 'Diritti',
        'meta' => 'Metadati',
        'licenses_count' => 'Licenze',
    ],

    'form' => [
        'details' => 'Dettagli template',
        'durations' => 'Durate e Periodi',
        'configuration' => 'Configurazione e funzionalità',
        'metadata' => 'Metadati',
    ],

    'actions' => [
        'create' => 'Nuovo template',
    ],

    'filters' => [
        'is_active' => 'Solo template attivi',
    ],

    'help' => [
        'license_duration_days' => 'Lasciare vuoto per licenze perpetue',
        'trial_duration_days' => 'Numero di giorni per il periodo di prova',
        'grace_period_days' => 'Numero di giorni per il periodo di grazia dopo la scadenza',
        'base_configuration' => 'Coppie chiave/valore unite alla configurazione base della licenza (es. max_usages, validity_days).',
        'features' => 'Flag booleani per abilitare funzionalità lato client.',
        'entitlements' => 'Limiti o diritti numerici/stringa (capacità, quote, ecc.).',
        'default_max_usages' => 'Numero massimo di utilizzi simultanei per licenza',
    ],
];
