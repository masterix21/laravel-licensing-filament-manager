<?php

return [
    'form' => [
        'basic_information' => 'Informazioni Licenza',
        'dates_activation' => 'Date & Attivazione',
        'usage_statistics' => 'Statistiche di utilizzo',
        'metadata' => 'Metadati',
        'security' => 'Sicurezza',
    ],

    'fields' => [
        'id' => 'ID Licenza',
        'key_hash' => 'Hash chiave licenza',
        'status' => 'Stato',
        'license_scope' => 'Ambito licenza',
        'licensable' => 'Entità licenziata',
        'licensable_type' => 'Tipo entità',
        'licensable_id' => 'ID entità',
        'template' => 'Template licenza',
        'max_usages' => 'Utilizzi massimi',
        'usages' => 'Utilizzi correnti',
        'remaining_usages' => 'Utilizzi rimanenti',
        'usage_percentage' => 'Percentuale utilizzo',
        'duration_days' => 'Durata (giorni)',
        'activated_at' => 'Attivata il',
        'expires_at' => 'Scade il',
        'meta' => 'Metadati',
        'key_visibility' => 'Recupero chiave',
    ],

    'actions' => [
        'create' => 'Nuova licenza',
        'activate' => 'Attiva',
        'suspend' => 'Sospendi',
        'renew' => 'Rinnova',
        'transfer' => 'Trasferisci',
        'show_key' => 'Mostra chiave licenza',
        'regenerate_key' => 'Rigenera chiave licenza',
    ],

    'filters' => [
        'expired' => 'Scadute',
        'expiring_soon' => 'In scadenza',
        'over_limit' => 'Oltre il limite d’uso',
    ],

    'help' => [
        'expires_at' => 'Lascia vuoto per calcolare automaticamente in base al template o alle impostazioni dell’ambito.',
        'template' => 'I template definiscono utilizzi massimi, durata, funzionalità e diritti.',
    ],

    'notifications' => [
        'created' => 'Licenza creata con successo.',
        'updated' => 'Licenza aggiornata con successo.',
        'activated' => 'Licenza attivata con successo.',
        'suspended' => 'Licenza sospesa con successo.',
        'renewed' => 'Licenza rinnovata con successo.',
        'key_generated' => 'Chiave licenza generata.',
        'key_retrieved' => 'Chiave licenza disponibile.',
        'key_regenerated' => 'Chiave licenza rigenerata.',
        'key_unavailable' => 'La chiave non può essere recuperata perché il recupero è disabilitato.',
        'key_value' => 'Chiave licenza: :key',
    ],

    'relations' => [
        'usages' => 'Utilizzi',
        'renewals' => 'Rinnovi',
        'transfers' => 'Trasferimenti',
    ],

    'security' => [
        'key_not_yet_generated' => 'La chiave verrà generata dopo il salvataggio.',
        'key_retrievable' => 'Il recupero della chiave crittografata è abilitato.',
        'key_not_retrievable' => 'Il recupero della chiave è disabilitato nella configurazione.',
    ],
];
