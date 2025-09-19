# Laravel Licensing Filament Manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/masterix21/laravel-licensing-filament-manager.svg?style=flat-square)](https://packagist.org/packages/masterix21/laravel-licensing-filament-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/masterix21/laravel-licensing-filament-manager/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/masterix21/laravel-licensing-filament-manager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/masterix21/laravel-licensing-filament-manager/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/masterix21/laravel-licensing-filament-manager/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/masterix21/laravel-licensing-filament-manager.svg?style=flat-square)](https://packagist.org/packages/masterix21/laravel-licensing-filament-manager)

A complete Filament 4.x panel integration for the [masterix21/laravel-licensing](https://github.com/masterix21/laravel-licensing) package. This package provides a beautiful and intuitive admin interface to manage software licenses, license scopes, templates, usage tracking, and comprehensive licensing statistics directly within your Filament panel.

## Related Packages

- **Main Package**: [masterix21/laravel-licensing](https://github.com/masterix21/laravel-licensing) - The core Laravel licensing system that provides the foundation for license management
- **Client Package**: [masterix21/laravel-licensing-client](https://github.com/masterix21/laravel-licensing-client) - Client library for integrating license validation in your applications

## Support This Project

If you find this package useful, please consider sponsoring me to support continued development and maintenance:

[![Sponsor on GitHub](https://img.shields.io/badge/Sponsor-GitHub%20Sponsors-ea4aaa?style=for-the-badge&logo=github)](https://github.com/sponsors/masterix21)

## Features

- 📊 **Complete License Management**: Create, edit, and manage software licenses with full lifecycle control
- 🔐 **License Scope Management**: Define and manage different license scopes with automatic key rotation
- 📋 **Template System**: Create reusable license templates with predefined configurations
- 📱 **Usage Tracking**: Monitor and manage license usage across devices with fingerprinting
- 🔑 **Signing Key Management**: Automatic and manual key rotation with revocation support
- 📈 **Statistics Dashboard**: View comprehensive licensing analytics with customizable widgets
- 🎨 **Native Filament 4 Integration**: Seamlessly integrates with your existing Filament panel
- 🌍 **Multi-language Support**: Available in 9 languages (English, Italian, Spanish, German, French, Russian, Chinese, Hindi, Polish)
- 🔧 **Highly Customizable**: Flexible configuration for licensable entities and custom validation

## Requirements

- PHP 8.4+
- Laravel 11.0+ or Laravel 12.0+
- Filament 4.0+
- masterix21/laravel-licensing 1.0+

## Installation

Install the package via composer:

```bash
composer require masterix21/laravel-licensing-filament-manager
```

The package will automatically register its service provider.

### Publishing Configuration

Optionally, you can publish the configuration file:

```bash
php artisan vendor:publish --tag="laravel-licensing-filament-manager-config"
```

### Publishing Migrations

If you need to customize the migrations:

```bash
php artisan vendor:publish --tag="laravel-licensing-filament-manager-migrations"
```

Then run the migrations:

```bash
php artisan migrate
```

## Configuration

### Adding to your Filament Panel

In your Filament panel configuration (typically `app/Providers/Filament/AdminPanelProvider.php`), register the plugin:

```php
use LucaLongo\LaravelLicensingFilamentManager\LaravelLicensingFilamentManagerPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        // ... other panel configuration
        ->plugins([
            LaravelLicensingFilamentManagerPlugin::make()
                ->navigationGroup('License Management') // Optional: customize navigation group
                ->navigationSort(10) // Optional: set navigation position
                ->enableStatistics(true) // Optional: enable/disable statistics dashboard
                ->enableBulkActions(true) // Optional: enable/disable bulk actions
        ]);
}
```

### Configuring Licensable Entities

The package allows you to configure which models in your application can have licenses attached to them. This is done through the `licensed_entities` configuration in the published config file:

```php
// config/licensing-filament-manager.php

return [
    'licensed_entities' => [
        // Map your model classes to their configuration
        \App\Models\User::class => [
            'title' => 'name', // The field to display as the entity's title
            'search' => ['name', 'email'], // Fields to search when selecting entities
        ],
        \App\Models\Team::class => [
            'title' => 'name',
            'search' => ['name', 'slug'],
        ],
        \App\Models\Organization::class => [
            'title' => 'company_name',
            'search' => ['company_name', 'tax_id'],
        ],
        // Add more models as needed
    ],
];
```

When creating or editing licenses, you'll be able to select which type of entity the license is for, and then search and select the specific entity. The license table will display the entity with its configured title field.

## Usage

Once installed and configured, the package adds the following sections to your Filament panel:

### License Scopes Resource

Manage different license scopes with automatic key rotation and default configurations:

- **Scope Management**: Create and manage license scopes with unique identifiers
- **Key Rotation**: Configure automatic signing key rotation intervals
- **Default Settings**: Set default max usages, duration, and grace periods
- **Templates**: Associate reusable templates with scopes
- **Metadata**: Store additional configuration data

Navigate to `/admin/license-scopes` in your Filament panel.

### Licenses Resource

Complete license lifecycle management:

- **License Creation**: Issue new licenses with automatic key generation
- **Entity Association**: Link licenses to users, teams, or custom entities
- **Template Application**: Apply predefined templates for consistent licensing
- **Status Management**: Track pending, active, expired, suspended states
- **Usage Monitoring**: Real-time usage tracking and remaining usage calculation
- **Key Management**: Secure key generation with optional retrieval
- **Bulk Operations**: Perform bulk actions on multiple licenses

Navigate to `/admin/licenses` in your Filament panel.

### License Templates

Create reusable license configurations:

- **Template Hierarchy**: Create parent and child templates with inheritance
- **Feature Configuration**: Define features and entitlements
- **Trial Support**: Configure trial periods and grace periods
- **Base Configuration**: Set default values for licenses created from templates
- **Tier Levels**: Organize templates by tier for different product levels

### License Usage Resource

Track and manage license usage across devices:

- **Usage Fingerprinting**: Track unique device/installation identifiers
- **Real-time Monitoring**: See last seen timestamps and activity status
- **Client Information**: Track IP addresses, user agents, and client types
- **Revocation**: Revoke specific usage instances
- **Heartbeat Tracking**: Monitor active connections with heartbeat updates
- **Bulk Management**: Revoke multiple usages at once

Navigate to `/admin/license-usages` in your Filament panel.

### Statistics Dashboard

Comprehensive licensing analytics with widgets:

- **License Overview**: Total licenses, active licenses, expiring soon
- **Usage Metrics**: Active usage count and seat utilization
- **Scope Statistics**: Number of active license scopes
- **Expiring Licenses**: List of licenses expiring within 30 days
- **Recent Activations**: Latest license activations and usage

Navigate to the dashboard widgets in your Filament panel.

## Basic Examples

### Creating a License Scope with Key Rotation

```php
use Masterix21\LaravelLicensing\Models\LicenseScope;

$scope = LicenseScope::create([
    'name' => 'Enterprise',
    'slug' => 'enterprise',
    'identifier' => 'com.yourcompany.enterprise',
    'description' => 'Enterprise license with advanced features',
    'is_active' => true,
    'default_max_usages' => 10,
    'default_duration_days' => 365,
    'default_grace_days' => 30,
    'key_rotation_days' => 90, // Rotate keys every 90 days
    'meta' => [
        'features' => ['api_access', 'priority_support', 'white_label'],
        'rate_limits' => ['api_calls' => 10000],
    ],
]);
```

### Creating a License Template

```php
use Masterix21\LaravelLicensing\Models\LicenseTemplate;

$template = LicenseTemplate::create([
    'license_scope_id' => $scope->id,
    'name' => 'Enterprise Annual',
    'slug' => 'enterprise-annual',
    'tier_level' => 3,
    'is_active' => true,
    'license_duration_days' => 365,
    'supports_trial' => true,
    'trial_duration_days' => 30,
    'has_grace_period' => true,
    'grace_period_days' => 15,
    'base_configuration' => [
        'max_usages' => 10,
    ],
    'features' => [
        'api_access' => true,
        'white_label' => true,
        'custom_branding' => true,
    ],
    'entitlements' => [
        'api_calls_per_month' => 100000,
        'storage_gb' => 500,
        'team_members' => 50,
    ],
]);
```

### Issuing a License with Template

```php
use Masterix21\LaravelLicensing\Models\License;

// Create license with automatic key generation
$license = License::createWithKey([
    'license_scope_id' => $scope->id,
    'template_id' => $template->id,
    'licensable_type' => \App\Models\Organization::class,
    'licensable_id' => $organization->id,
    'max_usages' => 10,
    'expires_at' => now()->addYear(),
    'meta' => [
        'customer_name' => $organization->name,
        'invoice_number' => 'INV-2024-001',
    ],
]);

// The license key is temporarily available via:
$licenseKey = $license->temporaryLicenseKey;
```

### Tracking License Usage

```php
use Masterix21\LaravelLicensing\Models\LicenseUsage;

// Record a new usage
$usage = LicenseUsage::create([
    'license_id' => $license->id,
    'usage_fingerprint' => hash('sha256', $deviceId . $machineId),
    'client_type' => 'desktop',
    'name' => 'John\'s MacBook Pro',
    'ip' => $request->ip(),
    'user_agent' => $request->userAgent(),
    'registered_at' => now(),
    'last_seen_at' => now(),
]);

// Update heartbeat
$usage->update(['last_seen_at' => now()]);

// Check if usage is active (seen in last 7 days)
$isActive = $usage->last_seen_at->diffInDays(now()) < 7;
```

## Customization

### Custom License Validation

You can add custom validation logic for licenses:

```php
use LucaLongo\LaravelLicensingFilamentManager\Resources\LicenseResource;

class CustomLicenseResource extends LicenseResource
{
    public static function beforeSave($record)
    {
        // Custom validation logic
        if ($record->scope->name === 'Enterprise' && !$record->user->is_verified) {
            throw new \Exception('Enterprise licenses require verified users');
        }
    }
}
```

### Extending Resources

All resources can be extended to add custom fields, actions, or business logic:

```php
namespace App\Filament\Resources;

use LucaLongo\LaravelLicensingFilamentManager\Resources\LicenseResource as BaseResource;

class LicenseResource extends BaseResource
{
    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                ...parent::getFormSchema(),
                // Add your custom fields
                Forms\Components\TextInput::make('custom_field'),
            ]);
    }
}
```

### Custom Widgets

Add custom widgets to the statistics dashboard:

```php
use LucaLongo\LaravelLicensingFilamentManager\Widgets\LicenseStatsWidget;

class CustomRevenueWidget extends LicenseStatsWidget
{
    protected function getStats(): array
    {
        return [
            'total_revenue' => License::sum('price'),
            'monthly_revenue' => License::whereMonth('created_at', now()->month)->sum('price'),
        ];
    }
}
```

## API Integration

The package works seamlessly with the laravel-licensing API endpoints for license validation and usage tracking:

```php
// License validation endpoint
Route::post('/api/license/validate', function (Request $request) {
    $license = License::where('key_hash', hash('sha256', $request->key))->firstOrFail();

    // Check if license is valid and active
    if ($license->status !== LicenseStatus::Active) {
        return response()->json(['valid' => false, 'reason' => 'License is not active']);
    }

    if ($license->isExpired()) {
        return response()->json(['valid' => false, 'reason' => 'License has expired']);
    }

    // Check usage limits
    $currentUsages = $license->usages()->where('revoked_at', null)->count();
    if ($currentUsages >= $license->max_usages) {
        return response()->json(['valid' => false, 'reason' => 'Maximum usage limit reached']);
    }

    // Create or update usage
    $fingerprint = hash('sha256', $request->device_id . $request->machine_id);
    $usage = $license->usages()->updateOrCreate(
        ['usage_fingerprint' => $fingerprint],
        [
            'client_type' => $request->client_type ?? 'unknown',
            'name' => $request->device_name,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'last_seen_at' => now(),
        ]
    );

    return response()->json([
        'valid' => true,
        'usage_id' => $usage->id,
        'features' => $license->template?->features ?? [],
        'entitlements' => $license->template?->entitlements ?? [],
        'expires_at' => $license->expires_at,
    ]);
});

// Heartbeat endpoint to keep usage active
Route::post('/api/license/heartbeat', function (Request $request) {
    $usage = LicenseUsage::where('id', $request->usage_id)
        ->where('usage_fingerprint', $request->fingerprint)
        ->firstOrFail();

    $usage->update(['last_seen_at' => now()]);

    return response()->json(['success' => true]);
});
```

## Available Components

The package provides several reusable components and traits:

### Resources
- `LicenseResource` - Complete license management interface
- `LicenseScopeResource` - License scope administration
- `LicenseUsageResource` - Usage tracking and management
- `LicenseTemplateResource` - Template management (relation manager)

### Relation Managers
- `LicensesRelationManager` - Manage licenses within scope context
- `SigningKeysRelationManager` - Handle signing keys for scopes
- `TemplatesRelationManager` - Manage templates for scopes
- `UsagesRelationManager` - Track usages for specific licenses
- `TrialsRelationManager` - Manage trial periods for licenses

### Widgets
- `LicenseStatsOverview` - Overview statistics cards
- `ExpiringLicenses` - Table of licenses expiring soon
- `RecentLicenseActivations` - Latest activation activity
- `LicenseStatsWidget` - Customizable statistics widget

### Form Schemas
- `LicenseForm` - Reusable license form configuration
- `LicenseScopeForm` - Scope form with sections
- `LicenseUsageForm` - Usage form fields
- `LicenseTemplateForm` - Template configuration form

### Table Configurations
- `LicenseTable` - Comprehensive license table with filters
- `LicenseScopeTable` - Scope table with bulk actions
- `LicenseUsageTable` - Usage tracking table

## Internationalization

The package includes complete translations for 9 languages:

- 🇬🇧 **English** (en)
- 🇮🇹 **Italian** (it)
- 🇪🇸 **Spanish** (es)
- 🇩🇪 **German** (de)
- 🇫🇷 **French** (fr)
- 🇷🇺 **Russian** (ru)
- 🇨🇳 **Chinese Simplified** (zh)
- 🇮🇳 **Hindi** (hi)
- 🇵🇱 **Polish** (pl)

### Publishing Translations

To customize translations, publish the language files:

```bash
php artisan vendor:publish --tag="laravel-licensing-filament-manager-translations"
```

Translation files will be published to `resources/lang/vendor/laravel-licensing-filament-manager/`.

## Testing

Run the test suite:

```bash
composer test
```

Run tests with coverage:

```bash
composer test-coverage
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Luca Longo](https://github.com/masterix21)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
