<?php

return [
    'fields' => [
        'name' => 'Template Name',
        'slug' => 'Slug',
        'tier_level' => 'Tier Level',
        'parent_template' => 'Parent Template',
        'is_active' => 'Active',
        'license_duration_days' => 'Duration',
        'supports_trial' => 'Trial',
        'trial_duration_days' => 'Trial Duration (days)',
        'has_grace_period' => 'Grace Period',
        'grace_period_days' => 'Grace Period (days)',
        'base_configuration' => 'Base Configuration',
        'features' => 'Features',
        'entitlements' => 'Entitlements',
        'meta' => 'Metadata',
    ],

    'form' => [
        'details' => 'Template Details',
        'durations' => 'Durations & Periods',
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
        'license_duration_days' => 'Number of days the license is valid for. Leave empty for unlimited duration.',
        'trial_duration_days' => 'Number of days for the trial period.',
        'grace_period_days' => 'Number of days after expiration before license is fully disabled.',
    ],

    'days' => ':count days',
];
