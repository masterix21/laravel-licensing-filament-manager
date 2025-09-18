<?php

return [
    'form' => [
        'basic_information' => 'Grundinformationen',
        'default_license_settings' => 'Standard-Lizenzeinstellungen',
        'default_license_settings_description' => 'Standardwerte für Lizenzen, die in diesem Bereich erstellt werden',
        'key_rotation_settings' => 'Schlüsselrotationseinstellungen',
        'key_rotation_settings_description' => 'Automatische Signaturschlüssel-Rotationskonfiguration',
        'metadata' => 'Metadaten',
    ],

    'fields' => [
        'name' => 'Name',
        'slug' => 'Slug',
        'slug_help' => 'URL-freundlicher Bezeichner (nur Kleinbuchstaben, Zahlen und Bindestriche)',
        'identifier' => 'Kennung',
        'identifier_help' => 'Eindeutige Kennung für API-Nutzung (z.B. com.firma.produkt)',
        'description' => 'Beschreibung',
        'is_active' => 'Aktiv',
        'default_max_usages' => 'Standard maximale Nutzungen',
        'default_duration_days' => 'Standarddauer (Tage)',
        'default_duration_days_help' => 'Leer lassen für unbefristete Lizenzen',
        'default_grace_days' => 'Standard-Karenzzeit (Tage)',
        'key_rotation_days' => 'Schlüsselrotationsintervall (Tage)',
        'key_rotation_days_help' => 'Auf 0 setzen, um automatische Rotation zu deaktivieren',
        'last_key_rotation_at' => 'Letzte Schlüsselrotation',
        'next_key_rotation_at' => 'Nächste geplante Rotation',
        'licenses_count' => 'Gesamtanzahl Lizenzen',
        'active_licenses_count' => 'Aktive Lizenzen',
        'meta' => 'Zusätzliche Metadaten',
    ],

    'actions' => [
        'create' => 'Neuer Lizenzbereich',
        'rotate_keys' => 'Schlüssel rotieren',
        'rotate_keys_modal_heading' => 'Signaturschlüssel rotieren',
        'rotate_keys_modal_description' => 'Dies wird aktuelle aktive Schlüssel widerrufen und neue generieren. Diese Aktion kann nicht rückgängig gemacht werden.',
        'manual_rotation' => 'Manuelle Rotation',
    ],

    'filters' => [
        'needs_rotation' => 'Benötigt Schlüsselrotation',
        'has_licenses' => 'Hat Lizenzen',
    ],

    'notifications' => [
        'created' => 'Lizenzbereich erfolgreich erstellt.',
        'updated' => 'Lizenzbereich erfolgreich aktualisiert.',
    ],

    'relations' => [
        'licenses' => 'Lizenzen',
        'signing_keys' => 'Signaturschlüssel',
    ],

    'perpetual' => 'Unbefristet',
    'rotation_days' => ':days Tage',
    'disabled' => 'Deaktiviert',
];