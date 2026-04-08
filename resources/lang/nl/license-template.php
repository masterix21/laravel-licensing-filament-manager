<?php

return [
    'fields' => [
        'scope' => 'Bereik',
        'global' => 'Globaal',
        'name' => 'Sjabloonnaam',
        'slug' => 'Slug',
        'tier_level' => 'Niveau',
        'parent_template' => 'Bovenliggend sjabloon',
        'is_active' => 'Actief',
        'supports_trial' => 'Ondersteunt proefversie',
        'trial_duration_days' => 'Proefperiode (Dagen)',
        'has_grace_period' => 'Heeft respijtperiode',
        'grace_period_days' => 'Respijtperiode (Dagen)',
        'license_duration_days' => 'Licentieduur (Dagen)',
        'default_max_usages' => 'Standaard Max. Gebruik',
        'days' => ':count dagen',
        'base_configuration' => 'Basisconfiguratie',
        'features' => 'Functies',
        'entitlements' => 'Rechten',
        'meta' => 'Metadata',
        'licenses_count' => 'Licenties',
    ],

    'form' => [
        'details' => 'Sjabloondetails',
        'durations' => 'Duur & Perioden',
        'configuration' => 'Configuratie & Functies',
        'metadata' => 'Metadata',
    ],

    'actions' => [
        'create' => 'Nieuw sjabloon',
    ],

    'filters' => [
        'is_active' => 'Alleen actieve sjablonen',
    ],

    'help' => [
        'license_duration_days' => 'Laat leeg voor eeuwigdurende licenties',
        'trial_duration_days' => 'Aantal dagen voor de proefperiode',
        'grace_period_days' => 'Aantal dagen voor de respijtperiode na vervaldatum',
        'base_configuration' => 'Sleutel/waarde-paren die worden samengevoegd met de basisconfiguratie van de licentie (bijv. max_usages, validity_days, grace_days).',
        'features' => 'Booleaanse vlaggen voor functieschakelaars die aan clients worden aangeboden.',
        'entitlements' => 'Numerieke of tekstuele rechten (limieten, capaciteiten, enz.).',
        'default_max_usages' => 'Maximaal aantal gelijktijdige gebruiken per licentie',
    ],
];
