<?php

return [
    'navigation_group' => 'Gestione licenze',

    'resources' => [
        'license' => [
            'navigation_label' => 'Licenze',
            'model_label' => 'Licenza',
            'plural_model_label' => 'Licenze',
        ],
        'license_template' => [
            'navigation_label' => 'Template licenza',
            'model_label' => 'Template licenza',
            'plural_model_label' => 'Template licenza',
        ],
        'license_usage' => [
            'navigation_label' => 'Utilizzi licenza',
            'model_label' => 'Utilizzo licenza',
            'plural_model_label' => 'Utilizzi licenza',
        ],
        'license_scope' => [
            'navigation_label' => 'Ambiti di Licenza',
            'model_label' => 'Ambito di Licenza',
            'plural_model_label' => 'Ambiti di Licenza',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Statistiche',
            'title' => 'Statistiche licensing',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Totale licenze',
            'total_licenses_description' => 'Tutte le licenze nel sistema',
            'active_licenses' => 'Licenze attive',
            'active_licenses_description' => 'Licenze attualmente attive',
            'total_usages' => 'Totale utilizzi',
            'total_usages_description' => 'Record di utilizzo licenze',
            'expiring_soon' => 'In scadenza',
            'expiring_soon_description' => 'Licenze attive in scadenza nei prossimi 30 giorni',
            'license_templates' => 'Template licenza',
            'license_templates_description' => 'Template licenza attivi',
        ],
        'recent_usages' => [
            'heading' => 'Utilizzi licenza recenti',
        ],
        'expiring_licenses' => [
            'heading' => 'Licenze in scadenza',
            'empty_heading' => 'Nessuna licenza in scadenza',
            'empty_description' => 'Non ci sono licenze in scadenza nei prossimi 30 giorni.',
        ],
    ],

    'fields' => [
        'license_key' => 'Chiave licenza',
        'key' => 'Chiave',
        'scope' => 'Ambito',
        'scope_id' => 'Ambito licenza',
        'template' => 'Template licenza',
        'licensable_type' => 'Tipo licenziabile',
        'licensable_id' => 'ID licenziabile',
        'expires_at' => 'Scade il',
        'is_active' => 'Attiva',
        'created_at' => 'Creata il',
        'updated_at' => 'Aggiornata il',
        'feature' => 'Funzione',
        'quantity' => 'Quantità',
        'used_at' => 'Utilizzata il',
        'days_remaining' => 'Giorni rimanenti',
        'device_id' => 'ID dispositivo',
        'device_name' => 'Nome dispositivo',
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
