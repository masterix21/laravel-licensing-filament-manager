<?php

return [
    'navigation_group' => 'License Management',

    'resources' => [
        'license' => [
            'navigation_label' => 'Licenses',
            'model_label' => 'License',
            'plural_model_label' => 'Licenses',
        ],
        'license_scope' => [
            'navigation_label' => 'License Scopes',
            'model_label' => 'License Scope',
            'plural_model_label' => 'License Scopes',
        ],
        'license_usage' => [
            'navigation_label' => 'License Usages',
            'model_label' => 'License Usage',
            'plural_model_label' => 'License Usages',
        ],
    ],

    'pages' => [
        'statistics' => [
            'navigation_label' => 'Statistics',
            'title' => 'Licensing Statistics',
        ],
    ],

    'widgets' => [
        'stats' => [
            'total_licenses' => 'Total Licenses',
            'total_licenses_description' => 'All licenses in the system',
            'active_licenses' => 'Active Licenses',
            'active_licenses_description' => 'Currently active licenses',
            'total_usages' => 'Total Usages',
            'total_usages_description' => 'License usage records',
            'license_scopes' => 'License Scopes',
            'license_scopes_description' => 'Available license types',
        ],
        'recent_usages' => [
            'heading' => 'Recent License Usages',
        ],
        'expiring_licenses' => [
            'heading' => 'Expiring Licenses',
            'empty_heading' => 'No expiring licenses',
            'empty_description' => 'There are no licenses expiring in the next 30 days.',
        ],
    ],

    'fields' => [
        'license_key' => 'License Key',
        'key' => 'Key',
        'scope' => 'Scope',
        'scope_id' => 'License Scope',
        'licensable_type' => 'Licensable Type',
        'licensable_id' => 'Licensable ID',
        'expires_at' => 'Expires At',
        'is_active' => 'Is Active',
        'created_at' => 'Created At',
        'updated_at' => 'Updated At',
        'feature' => 'Feature',
        'quantity' => 'Quantity',
        'used_at' => 'Used At',
        'days_remaining' => 'Days Left',
        'device_id' => 'Device ID',
        'device_name' => 'Device Name',
        'metadata' => 'Metadata',
        'activated_at' => 'Activated At',
        'deactivated_at' => 'Deactivated At',
    ],

    'actions' => [
        'create' => 'Create',
        'edit' => 'Edit',
        'view' => 'View',
        'delete' => 'Delete',
        'deactivate' => 'Deactivate',
    ],

    'filters' => [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'deactivated' => 'Deactivated',
    ],
];
