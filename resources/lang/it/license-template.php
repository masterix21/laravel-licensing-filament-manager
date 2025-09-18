<?php

return [
    'fields' => [
        'name' => 'Nome template',
        'slug' => 'Slug',
        'tier_level' => 'Livello tier',
        'is_active' => 'Attivo',
        'base_configuration' => 'Configurazione base',
        'features' => 'Funzionalità',
        'entitlements' => 'Diritti',
        'meta' => 'Metadati',
    ],

    'form' => [
        'details' => 'Dettagli template',
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
        'base_configuration' => 'Coppie chiave/valore unite alla configurazione base della licenza (es. max_usages, validity_days).',
        'features' => 'Flag booleani per abilitare funzionalità lato client.',
        'entitlements' => 'Limiti o diritti numerici/stringa (capacità, quote, ecc.).',
    ],
];
