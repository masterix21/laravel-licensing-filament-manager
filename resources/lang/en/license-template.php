<?php

return [
    'fields' => [
        'scope' => 'Scope',
        'global' => 'Global',
        'name' => 'Template Name',
        'slug' => 'Slug',
        'tier_level' => 'Tier Level',
        'parent_template' => 'Parent Template',
        'is_active' => 'Active',
        'supports_trial' => 'Supports Trial',
        'trial_duration_days' => 'Trial Duration (Days)',
        'has_grace_period' => 'Has Grace Period',
        'grace_period_days' => 'Grace Period (Days)',
        'license_duration_days' => 'License Duration (Days)',
        'default_max_usages' => 'Default Max Usages',
        'days' => ':count days',
        'base_configuration' => 'Base Configuration',
        'features' => 'Features',
        'entitlements' => 'Entitlements',
        'meta' => 'Metadata',
        'licenses_count' => 'Licenses',
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
        'license_duration_days' => 'Leave empty for perpetual licenses',
        'trial_duration_days' => 'Number of days for the trial period',
        'grace_period_days' => 'Number of days for the grace period after expiration',
        'base_configuration' => 'Key/value pairs merged into license base configuration (e.g. max_usages, validity_days, grace_days).',
        'features' => 'Boolean flags for feature toggles exposed to clients.',
        'entitlements' => 'Numeric or string entitlements (limits, capacities, etc.).',
        'default_max_usages' => 'Maximum number of concurrent usages per license',
    ],
];
