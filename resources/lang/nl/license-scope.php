<?php

return [
    'form' => [
        'basic_information' => 'Basisinformatie',
        'default_license_settings' => 'Standaard licentie-instellingen',
        'default_license_settings_description' => 'Standaardwaarden voor licenties die binnen dit bereik worden aangemaakt',
        'key_rotation_settings' => 'Sleutelrotatie-instellingen',
        'key_rotation_settings_description' => 'Configuratie voor automatische rotatie van ondertekeningssleutels',
        'metadata' => 'Metadata',
    ],

    'fields' => [
        'name' => 'Naam',
        'slug' => 'Slug',
        'slug_help' => 'URL-vriendelijke identificatie (alleen kleine letters, cijfers en streepjes)',
        'identifier' => 'Identificatie',
        'identifier_help' => 'Unieke identificatie voor API-gebruik (bijv. com.bedrijf.product)',
        'description' => 'Beschrijving',
        'is_active' => 'Actief',
        'default_max_usages' => 'Standaard max. gebruik',
        'default_duration_days' => 'Standaard duur',
        'default_duration_days_help' => 'Laat leeg voor eeuwigdurende licenties',
        'default_grace_days' => 'Standaard respijtperiode',
        'key_rotation_days' => 'Sleutelrotatie-interval',
        'key_rotation_days_help' => 'Stel in op 0 om automatische rotatie uit te schakelen',
        'last_key_rotation_at' => 'Laatste sleutelrotatie',
        'next_key_rotation_at' => 'Volgende geplande rotatie',
        'licenses_count' => 'Totaal licenties',
        'active_licenses_count' => 'Actieve licenties',
        'meta' => 'Aanvullende metadata',
    ],

    'actions' => [
        'create' => 'Nieuw licentiebereik',
        'rotate_keys' => 'Sleutels roteren',
        'rotate_keys_modal_heading' => 'Ondertekeningssleutels roteren',
        'rotate_keys_modal_description' => 'Hiermee worden de huidige actieve sleutels ingetrokken en nieuwe gegenereerd. Deze actie kan niet ongedaan worden gemaakt.',
        'manual_rotation' => 'Handmatige rotatie',
    ],

    'filters' => [
        'needs_rotation' => 'Sleutelrotatie nodig',
        'has_licenses' => 'Heeft licenties',
    ],

    'notifications' => [
        'created' => 'Licentiebereik succesvol aangemaakt.',
        'updated' => 'Licentiebereik succesvol bijgewerkt.',
    ],

    'relations' => [
        'licenses' => 'Licenties',
        'signing_keys' => 'Ondertekeningssleutels',
    ],

    'perpetual' => 'Eeuwigdurend',
    'unlimited' => 'Onbeperkt',
    'seats' => 'plaatsen',
    'days' => 'dagen',
    'none' => 'Geen',
    'rotation_days' => ':days dagen',
    'disabled' => 'Uitgeschakeld',
];
