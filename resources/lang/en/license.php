<?php

return [
    'form' => [
        'basic_information' => 'License Information',
        'dates_activation' => 'Dates & Activation',
        'usage_statistics' => 'Usage Statistics',
        'metadata' => 'Metadata',
    ],

    'fields' => [
        'id' => 'License ID',
        'key_hash' => 'License Key Hash',
        'status' => 'Status',
        'license_scope' => 'License Scope',
        'licensable' => 'Licensed Entity',
        'licensable_type' => 'Licensed Type',
        'licensable_id' => 'Licensed ID',
        'max_usages' => 'Max Usages',
        'usages' => 'Current Usages',
        'remaining_usages' => 'Remaining Usages',
        'usage_percentage' => 'Usage %',
        'duration_days' => 'Duration (Days)',
        'activated_at' => 'Activated At',
        'expires_at' => 'Expires At',
        'meta' => 'Metadata',
    ],

    'actions' => [
        'create' => 'New License',
        'activate' => 'Activate',
        'suspend' => 'Suspend',
        'renew' => 'Renew',
        'transfer' => 'Transfer',
    ],

    'filters' => [
        'expired' => 'Expired',
        'expiring_soon' => 'Expiring Soon',
        'over_limit' => 'Over Usage Limit',
    ],

    'notifications' => [
        'created' => 'License created successfully.',
        'updated' => 'License updated successfully.',
        'activated' => 'License activated successfully.',
        'suspended' => 'License suspended successfully.',
        'renewed' => 'License renewed successfully.',
    ],

    'relations' => [
        'usages' => 'Usages',
        'renewals' => 'Renewals',
        'transfers' => 'Transfers',
    ],
];
