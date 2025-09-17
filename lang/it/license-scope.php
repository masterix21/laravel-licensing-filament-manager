<?php

return [
    'form' => [
        'basic_information' => 'Informazioni Base',
        'default_license_settings' => 'Impostazioni Predefinite Licenza',
        'default_license_settings_description' => 'Valori predefiniti per le licenze create in questo ambito',
        'key_rotation_settings' => 'Impostazioni Rotazione Chiavi',
        'key_rotation_settings_description' => 'Configurazione rotazione automatica chiavi di firma',
        'statistics' => 'Statistiche',
        'metadata' => 'Metadati',
    ],

    'fields' => [
        'name' => 'Nome',
        'slug' => 'Slug',
        'slug_help' => 'Identificatore URL-friendly (solo lettere minuscole, numeri e trattini)',
        'identifier' => 'Identificatore',
        'identifier_help' => 'Identificatore univoco per uso API (es. com.company.product)',
        'description' => 'Descrizione',
        'is_active' => 'Attivo',
        'default_max_usages' => 'Utilizzi Massimi Predefiniti',
        'default_duration_days' => 'Durata Predefinita (Giorni)',
        'default_duration_days_help' => 'Lascia vuoto per licenze perpetue',
        'default_grace_days' => 'Periodo di Grazia Predefinito (Giorni)',
        'key_rotation_days' => 'Intervallo Rotazione Chiavi (Giorni)',
        'key_rotation_days_help' => 'Imposta a 0 per disabilitare la rotazione automatica',
        'last_key_rotation_at' => 'Ultima Rotazione Chiavi',
        'next_key_rotation_at' => 'Prossima Rotazione Programmata',
        'licenses_count' => 'Totale Licenze',
        'active_licenses_count' => 'Licenze Attive',
        'signing_keys_count' => 'Chiavi di Firma',
        'meta' => 'Metadati Aggiuntivi',
    ],

    'actions' => [
        'create' => 'Nuovo Ambito Licenza',
        'rotate_keys' => 'Ruota Chiavi',
        'rotate_keys_modal_heading' => 'Rotazione Chiavi di Firma',
        'rotate_keys_modal_description' => 'Questo revocherà le chiavi attive correnti e ne genererà di nuove. Questa azione non può essere annullata.',
        'manual_rotation' => 'Rotazione manuale',
    ],

    'filters' => [
        'needs_rotation' => 'Necessita Rotazione Chiavi',
        'has_licenses' => 'Ha Licenze',
    ],

    'notifications' => [
        'created' => 'Ambito Licenza creato con successo.',
        'updated' => 'Ambito Licenza aggiornato con successo.',
    ],

    'relations' => [
        'licenses' => 'Licenze',
        'signing_keys' => 'Chiavi di Firma',
    ],

    'perpetual' => 'Perpetua',
    'rotation_days' => ':days giorni',
    'disabled' => 'Disabilitato',
];