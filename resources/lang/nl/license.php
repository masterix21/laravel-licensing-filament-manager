<?php

return [
    'form' => [
        'basic_information' => 'Licentie-informatie',
        'dates_activation' => 'Datums & Activering',
        'usage_statistics' => 'Gebruiksstatistieken',
        'metadata' => 'Metadata',
        'security' => 'Beveiliging',
    ],

    'fields' => [
        'id' => 'Licentie ID',
        'key_hash' => 'Licentiesleutel Hash',
        'status' => 'Status',
        'license_scope' => 'Licentiebereik',
        'licensable' => 'Gelicentieerde entiteit',
        'template' => 'Licentiesjabloon',
        'max_usages' => 'Max. gebruik',
        'usages' => 'Gebruik',
        'remaining_usages' => 'Resterend gebruik',
        'usage_percentage' => 'Gebruik %',
        'duration_days' => 'Duur (dagen)',
        'activated_at' => 'Geactiveerd op',
        'expires_at' => 'Verloopt op',
        'meta' => 'Metadata',
        'key_visibility' => 'Sleutel ophalen',
    ],

    'actions' => [
        'create' => 'Nieuwe licentie',
        'activate' => 'Activeren',
        'suspend' => 'Opschorten',
        'renew' => 'Verlengen',
        'show_key' => 'Licentiesleutel tonen',
        'regenerate_key' => 'Licentiesleutel opnieuw genereren',
    ],

    'filters' => [
        'expired' => 'Verlopen',
        'expiring_soon' => 'Verloopt binnenkort',
        'over_limit' => 'Gebruikslimiet overschreden',
    ],

    'help' => [
        'expires_at' => 'Laat leeg om automatisch te berekenen op basis van sjabloonstandaarden of bereikconfiguratie.',
        'template' => 'Sjablonen bepalen het maximale gebruik, geldigheid, functies en rechten.',
    ],

    'notifications' => [
        'created' => 'Licentie succesvol aangemaakt.',
        'updated' => 'Licentie succesvol bijgewerkt.',
        'activated' => 'Licentie succesvol geactiveerd.',
        'suspended' => 'Licentie succesvol opgeschort.',
        'renewed' => 'Licentie succesvol verlengd.',
        'key_generated' => 'Licentiesleutel gegenereerd.',
        'key_retrieved' => 'Licentiesleutel gereed.',
        'key_regenerated' => 'Licentiesleutel opnieuw gegenereerd.',
        'key_unavailable' => 'De licentiesleutel kan niet worden opgehaald omdat ophalen is uitgeschakeld.',
        'key_value' => 'Licentiesleutel: :key',
    ],

    'statuses' => [
        'pending' => 'In behandeling',
        'active' => 'Actief',
        'grace' => 'Respijtperiode',
        'expired' => 'Verlopen',
        'suspended' => 'Opgeschort',
        'cancelled' => 'Geannuleerd',
    ],

    'relations' => [
        'usages' => 'Gebruik',
        'renewals' => 'Verlengingen',
        'transfers' => 'Overdrachten',
        'trials' => 'Proefversies',
    ],

    'security' => [
        'key_not_yet_generated' => 'De licentiesleutel wordt na het opslaan gegenereerd.',
        'key_retrievable' => 'Versleutelde sleutel ophalen is ingeschakeld.',
        'key_not_retrievable' => 'Sleutel ophalen is uitgeschakeld in de licentieconfiguratie.',
    ],
];
