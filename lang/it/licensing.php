<?php

return [
    'navigation_group' => 'Gestione Licenze',

    'resources' => [
        'license' => [
            'navigation_label' => 'Licenze',
            'model_label' => 'Licenza',
            'plural_model_label' => 'Licenze',
        ],
        'license_scope' => [
            'navigation_label' => 'Ambiti Licenza',
            'model_label' => 'Ambito Licenza',
            'plural_model_label' => 'Ambiti Licenza',
        ],
        'license_usage' => [
            'navigation_label' => 'Utilizzi Licenza',
            'model_label' => 'Utilizzo Licenza',
            'plural_model_label' => 'Utilizzi Licenza',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Statistiche',
            'title' => 'Statistiche Licenze',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Totale Licenze',
            'total_licenses_description' => 'Tutte le licenze nel sistema',
            'active_licenses' => 'Licenze Attive',
            'active_licenses_description' => 'Licenze attualmente attive',
            'total_usages' => 'Utilizzi Totali',
            'total_usages_description' => 'Record di utilizzo licenze',
            'license_scopes' => 'Ambiti Licenza',
            'license_scopes_description' => 'Tipi di licenza disponibili',
        ],
        'recent_usages' => [
            'heading' => 'Utilizzi Recenti',
        ],
        'expiring_licenses' => [
            'heading' => 'Licenze in Scadenza',
            'empty_heading' => 'Nessuna licenza in scadenza',
            'empty_description' => 'Non ci sono licenze in scadenza nei prossimi 30 giorni.',
        ],
    ],

    'fields' => [
        'license_key' => 'Chiave Licenza',
        'key' => 'Chiave',
        'scope' => 'Ambito',
        'scope_id' => 'Ambito Licenza',
        'licensable_type' => 'Tipo Licenziabile',
        'licensable_id' => 'ID Licenziabile',
        'expires_at' => 'Scade il',
        'is_active' => 'Attiva',
        'created_at' => 'Creata il',
        'updated_at' => 'Aggiornata il',
        'feature' => 'Funzionalità',
        'quantity' => 'Quantità',
        'used_at' => 'Utilizzata il',
        'days_remaining' => 'Giorni Rimanenti',
        'device_id' => 'ID Dispositivo',
        'device_name' => 'Nome Dispositivo',
        'metadata' => 'Metadati',
        'activated_at' => 'Attivata il',
        'deactivated_at' => 'Disattivata il',
    ],

    'actions' => [
        'create' => 'Crea',
        'edit' => 'Modifica',
        'view' => 'Visualizza',
        'delete' => 'Elimina',
        'deactivate' => 'Disattiva',
    ],

    'filters' => [
        'active' => 'Attive',
        'inactive' => 'Inattive',
        'deactivated' => 'Disattivate',
    ],
];
