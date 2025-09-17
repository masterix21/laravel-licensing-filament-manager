<?php

return [
    'form' => [
        'basic_information' => 'License Information',
        'dates_activation' => 'Dates & Activation',
        'usage_statistics' => 'Usage Statistics',
        'metadata' => 'Metadata',
        'security' => 'Security',
    ],

    'fields' => [
        'id' => 'License ID',
        'key_hash' => 'License Key Hash',
        'status' => 'Status',
        'license_scope' => 'License Scope',
        'licensable' => 'Licensed Entity',
        'licensable_type' => 'Licensed Type',
        'licensable_id' => 'Licensed ID',
        'template' => 'License Template',
        'max_usages' => 'Max Usages',
        'usages' => 'Current Usages',
        'remaining_usages' => 'Remaining Usages',
        'usage_percentage' => 'Usage %',
        'duration_days' => 'Duration (Days)',
        'activated_at' => 'Activated At',
        'expires_at' => 'Expires At',
        'meta' => 'Metadata',
        'key_visibility' => 'Key Retrieval',
    ],

    'actions' => [
        'create' => 'New License',
        'activate' => 'Activate',
        'suspend' => 'Suspend',
        'renew' => 'Renew',
        'transfer' => 'Transfer',
        'show_key' => 'Show License Key',
        'regenerate_key' => 'Regenerate License Key',
    ],

    'filters' => [
        'expired' => 'Expired',
        'expiring_soon' => 'Expiring Soon',
        'over_limit' => 'Over Usage Limit',
    ],

    'help' => [
        'expires_at' => 'Leave empty to auto-calculate based on template defaults or scope configuration.',
        'template' => 'Templates control max usages, validity, features and entitlements.',
    ],

    'notifications' => [
        'created' => 'License created successfully.',
        'updated' => 'License updated successfully.',
        'activated' => 'License activated successfully.',
        'suspended' => 'License suspended successfully.',
        'renewed' => 'License renewed successfully.',
        'key_generated' => 'License key generated.',
        'key_retrieved' => 'License key ready.',
        'key_regenerated' => 'License key regenerated.',
        'key_unavailable' => 'The license key cannot be retrieved because retrieval is disabled.',
        'key_value' => 'License key: :key',
    ],

    'relations' => [
        'usages' => 'Usages',
        'renewals' => 'Renewals',
        'transfers' => 'Transfers',
    ],

    'security' => [
        'key_not_yet_generated' => 'The license key will be generated after saving.',
        'key_retrievable' => 'Encrypted key retrieval is enabled.',
        'key_not_retrievable' => 'Key retrieval is disabled in the licensing configuration.',
    ],
];
