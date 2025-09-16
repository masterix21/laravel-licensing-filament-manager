<?php

return [
    'form' => [
        'basic_information' => 'Basic Information',
        'default_license_settings' => 'Default License Settings',
        'default_license_settings_description' => 'Default values for licenses created within this scope',
        'key_rotation_settings' => 'Key Rotation Settings',
        'key_rotation_settings_description' => 'Automatic signing key rotation configuration',
        'statistics' => 'Statistics',
        'metadata' => 'Metadata',
    ],

    'fields' => [
        'name' => 'Name',
        'slug' => 'Slug',
        'identifier' => 'Identifier',
        'identifier_help' => 'Unique identifier for API usage (e.g., com.company.product)',
        'description' => 'Description',
        'is_active' => 'Active',
        'default_max_usages' => 'Default Max Usages',
        'default_duration_days' => 'Default Duration (Days)',
        'default_duration_days_help' => 'Leave empty for perpetual licenses',
        'default_grace_days' => 'Default Grace Period (Days)',
        'key_rotation_days' => 'Key Rotation Interval (Days)',
        'key_rotation_days_help' => 'Set to 0 to disable automatic rotation',
        'last_key_rotation_at' => 'Last Key Rotation',
        'next_key_rotation_at' => 'Next Scheduled Rotation',
        'licenses_count' => 'Total Licenses',
        'active_licenses_count' => 'Active Licenses',
        'signing_keys_count' => 'Signing Keys',
        'meta' => 'Additional Metadata',
    ],

    'actions' => [
        'create' => 'New License Scope',
        'rotate_keys' => 'Rotate Keys',
        'rotate_keys_modal_heading' => 'Rotate Signing Keys',
        'rotate_keys_modal_description' => 'This will revoke current active keys and generate new ones. This action cannot be undone.',
        'manual_rotation' => 'Manual rotation',
    ],

    'filters' => [
        'needs_rotation' => 'Needs Key Rotation',
        'has_licenses' => 'Has Licenses',
    ],

    'notifications' => [
        'created' => 'License Scope created successfully.',
        'updated' => 'License Scope updated successfully.',
    ],

    'relations' => [
        'licenses' => 'Licenses',
        'signing_keys' => 'Signing Keys',
    ],

    'perpetual' => 'Perpetual',
    'rotation_days' => ':days days',
    'disabled' => 'Disabled',
];
