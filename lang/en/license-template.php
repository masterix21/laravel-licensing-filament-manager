<?php

return [
    'fields' => [
        'name' => 'Template Name',
        'slug' => 'Slug',
        'tier_level' => 'Tier Level',
        'is_active' => 'Active',
        'base_configuration' => 'Base Configuration',
        'features' => 'Features',
        'entitlements' => 'Entitlements',
        'meta' => 'Metadata',
    ],

    'form' => [
        'details' => 'Template Details',
        'configuration' => 'Configuration & Features',
        'metadata' => 'Metadata',
    ],

    'actions' => [
        'create' => 'New Template',
    ],

    'filters' => [
        'is_active' => 'Only active templates',
    ],

    'help' => [
        'base_configuration' => 'Key/value pairs merged into license base configuration (e.g. max_usages, validity_days).',
        'features' => 'Boolean flags for feature toggles exposed to clients.',
        'entitlements' => 'Numeric or string entitlements (limits, capacities, etc.).',
    ],
];
