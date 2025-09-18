<?php

return [
    'form' => [
        'basic_information' => 'Lizenzinformationen',
        'dates_activation' => 'Daten & Aktivierung',
        'usage_statistics' => 'Nutzungsstatistiken',
        'metadata' => 'Metadaten',
        'security' => 'Sicherheit',
    ],

    'fields' => [
        'id' => 'Lizenz-ID',
        'key_hash' => 'Lizenzschlüssel-Hash',
        'status' => 'Status',
        'license_scope' => 'Lizenzbereich',
        'licensable' => 'Lizenzierte Entität',
        'template' => 'Lizenzvorlage',
        'max_usages' => 'Max. Nutzungen',
        'usages' => 'Nutzungen',
        'remaining_usages' => 'Verbleibende Nutzungen',
        'usage_percentage' => 'Nutzung %',
        'duration_days' => 'Dauer (Tage)',
        'activated_at' => 'Aktiviert am',
        'expires_at' => 'Läuft ab am',
        'meta' => 'Metadaten',
        'key_visibility' => 'Schlüsselabruf',
    ],

    'actions' => [
        'create' => 'Neue Lizenz',
        'activate' => 'Aktivieren',
        'suspend' => 'Suspendieren',
        'renew' => 'Erneuern',
        'show_key' => 'Lizenzschlüssel anzeigen',
        'regenerate_key' => 'Lizenzschlüssel neu generieren',
    ],

    'filters' => [
        'expired' => 'Abgelaufen',
        'expiring_soon' => 'Läuft bald ab',
        'over_limit' => 'Über Nutzungsgrenze',
    ],

    'help' => [
        'expires_at' => 'Leer lassen für automatische Berechnung basierend auf Vorlagen-Standards oder Bereichskonfiguration.',
        'template' => 'Vorlagen steuern max. Nutzungen, Gültigkeit, Funktionen und Berechtigungen.',
    ],

    'notifications' => [
        'created' => 'Lizenz erfolgreich erstellt.',
        'updated' => 'Lizenz erfolgreich aktualisiert.',
        'activated' => 'Lizenz erfolgreich aktiviert.',
        'suspended' => 'Lizenz erfolgreich suspendiert.',
        'renewed' => 'Lizenz erfolgreich erneuert.',
        'key_generated' => 'Lizenzschlüssel generiert.',
        'key_retrieved' => 'Lizenzschlüssel bereit.',
        'key_regenerated' => 'Lizenzschlüssel neu generiert.',
        'key_unavailable' => 'Der Lizenzschlüssel kann nicht abgerufen werden, da der Abruf deaktiviert ist.',
        'key_value' => 'Lizenzschlüssel: :key',
    ],

    'relations' => [
        'usages' => 'Nutzungen',
        'renewals' => 'Erneuerungen',
        'transfers' => 'Übertragungen',
    ],

    'security' => [
        'key_not_yet_generated' => 'Der Lizenzschlüssel wird nach dem Speichern generiert.',
        'key_retrievable' => 'Verschlüsselter Schlüsselabruf ist aktiviert.',
        'key_not_retrievable' => 'Schlüsselabruf ist in der Lizenzkonfiguration deaktiviert.',
    ],
];
