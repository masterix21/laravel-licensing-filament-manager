# Laravel Licensing Filament Manager

[![Latest Version on Packagist](https://img.shields.io/packagist/v/lucalongo/laravel-licensing-filament-manager.svg?style=flat-square)](https://packagist.org/packages/lucalongo/laravel-licensing-filament-manager)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/lucalongo/laravel-licensing-filament-manager/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/lucalongo/laravel-licensing-filament-manager/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/lucalongo/laravel-licensing-filament-manager/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/lucalongo/laravel-licensing-filament-manager/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/lucalongo/laravel-licensing-filament-manager.svg?style=flat-square)](https://packagist.org/packages/lucalongo/laravel-licensing-filament-manager)

A complete Filament 4.x panel integration for the [masterix21/laravel-licensing](https://github.com/masterix21/laravel-licensing) package. This package provides a beautiful and intuitive admin interface to manage software licenses, license scopes, activations, and view comprehensive licensing statistics directly within your Filament panel.

## Features

- 📊 **Complete License Management**: Create, edit, and manage software licenses
- 🔐 **License Scope Control**: Define and manage different license scopes with specific constraints
- ✅ **Activation Tracking**: Monitor and manage license activations across devices
- 📈 **Statistics Dashboard**: View comprehensive licensing analytics and metrics
- 🎨 **Native Filament 4 Integration**: Seamlessly integrates with your existing Filament panel
- 🌍 **Multi-language Support**: Full translation support for internationalization
- 🔧 **Customizable**: Easily extend and customize to fit your needs

## Requirements

- PHP 8.4+
- Laravel 11.0+ or Laravel 12.0+
- Filament 4.0+
- masterix21/laravel-licensing 1.0+

## Installation

Install the package via composer:

```bash
composer require lucalongo/laravel-licensing-filament-manager
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

## Usage

Once installed and configured, the package adds the following sections to your Filament panel:

### License Scopes Resource

Manage different types of licenses with specific constraints:

- **Create License Scopes**: Define new license types (e.g., Basic, Professional, Enterprise)
- **Set Constraints**: Configure activation limits, expiration policies, and feature flags
- **Validation Rules**: Define custom validation for each license scope

Navigate to `/admin/license-scopes` in your Filament panel.

### Licenses Resource

Manage individual software licenses:

- **Issue Licenses**: Create new licenses for customers
- **License Keys**: Generate and manage unique license keys
- **Expiration Management**: Set and track license expiration dates
- **Status Control**: Activate, deactivate, or revoke licenses
- **Customer Association**: Link licenses to specific users or customers

Navigate to `/admin/licenses` in your Filament panel.

### License Activations Resource

Track and manage where licenses are being used:

- **Device Tracking**: Monitor which devices have activated licenses
- **Activation History**: View complete activation timeline
- **Remote Deactivation**: Deactivate licenses from specific devices
- **Hardware Fingerprinting**: Track unique device identifiers

Navigate to `/admin/license-activations` in your Filament panel.

### Statistics Dashboard

View comprehensive licensing analytics:

- **Active Licenses**: Total number of active licenses
- **Activation Trends**: Graphs showing activation patterns over time
- **Revenue Metrics**: Track licensing revenue (if integrated with billing)
- **Usage Statistics**: See which license types are most popular
- **Expiration Forecasting**: View upcoming license expirations

Navigate to `/admin/licensing-statistics` in your Filament panel.

## Basic Examples

### Creating a License Scope

```php
use Masterix21\LaravelLicensing\Models\LicenseScope;

$scope = LicenseScope::create([
    'name' => 'Professional',
    'max_activations' => 3,
    'expires_in_days' => 365,
    'features' => ['advanced_reports', 'priority_support'],
]);
```

### Issuing a License

```php
use Masterix21\LaravelLicensing\Models\License;

$license = License::create([
    'scope_id' => $scope->id,
    'user_id' => $user->id,
    'key' => License::generateKey(),
    'expires_at' => now()->addYear(),
]);
```

### Checking License Status

```php
// In your application
if ($user->hasActiveLicense('professional')) {
    // Enable professional features
}
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

The package works seamlessly with the laravel-licensing API endpoints:

```php
// Your API endpoint for license validation
Route::post('/api/license/validate', function (Request $request) {
    $license = License::where('key', $request->key)->firstOrFail();

    if ($license->canActivate($request->device_id)) {
        $activation = $license->activate($request->device_id);
        return response()->json(['activated' => true, 'activation_id' => $activation->id]);
    }

    return response()->json(['activated' => false, 'reason' => 'Max activations reached']);
});
```

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
