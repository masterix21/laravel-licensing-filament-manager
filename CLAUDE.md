# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Package Overview

This package provides a complete Filament 4.x panel integration for managing all features of the `masterix21/laravel-licensing` package. It enables administrators to manage license scopes, licenses, license activations, and view licensing statistics directly within a Filament panel through dedicated resources, pages, and widgets.

## Development Commands

### Testing
```bash
# Run all tests
composer test

# Run tests with coverage
composer test-coverage

# Run a specific test file
vendor/bin/pest tests/ExampleTest.php

# Run PHPStan analysis
composer analyse
```

### Code Quality
```bash
# Format code with Laravel Pint
composer format

# Run PHPStan analysis
vendor/bin/phpstan analyse
```

### Package Development
```bash
# Discover package after changes
composer prepare

# This runs automatically after composer autoload dump
```

## Architecture Overview

### Package Structure
- **Service Provider**: `LaravelLicensingFilamentManagerServiceProvider` - Uses Spatie's PackageServiceProvider for package registration
- **Main Class**: `LaravelLicensingFilamentManager` - Currently minimal, main package logic to be implemented
- **Facade**: `LaravelLicensingFilamentManager` - Provides static access to the main class
- **Command**: `LaravelLicensingFilamentManagerCommand` - Artisan command for package operations

### Dependencies
- **Core**: Laravel 11/12, PHP 8.4+, Filament 4.0+
- **Base Package**: `masterix21/laravel-licensing` v1.0+ (the core licensing functionality)
- **Package Tools**: Spatie's `laravel-package-tools` for package scaffolding
- **Testing**: Pest PHP with Orchestra Testbench
- **Code Quality**: PHPStan (level 5), Laravel Pint for formatting

### Configuration
- Config file: `config/licensing-filament-manager.php` (currently empty)
- Database migration: `create_laravel_licensing_filament_manager_table`
- Views are publishable but not yet implemented

### Testing Setup
- Uses Pest PHP as the testing framework
- Orchestra Testbench provides Laravel testing environment
- Tests located in `tests/` directory
- `TestCase` class extends Orchestra's TestCase
- Architecture tests included via `pestphp/pest-plugin-arch`

## Publishing Assets

```bash
# Publish migrations
php artisan vendor:publish --tag="laravel-licensing-filament-manager-migrations"

# Publish config
php artisan vendor:publish --tag="laravel-licensing-filament-manager-config"

# Publish views
php artisan vendor:publish --tag="laravel-licensing-filament-manager-views"
```

## GitHub Actions

The package includes automated workflows:
- **Tests**: Runs on multiple PHP/Laravel versions
- **Code Style**: Automatically fixes PHP code style issues with Pint
- **PHPStan**: Static analysis on push/PR
- **Changelog**: Auto-updates changelog on releases
- **Dependabot**: Auto-merge for dependency updates

## Filament 4 Integration Guidelines

### Resource Configuration
- **Navigation Properties**: Use proper types for navigation configuration:
  - `$navigationGroup`: `string | UnitEnum | null`
  - `$navigationIcon`: `string | BackedEnum | null` (requires `use BackedEnum;`)
  - `$navigationLabel`: `?string`
  - `$navigationSort`: `?int`

- **Method Signatures**: Filament 4 uses Schema-based approach:
  ```php
  public static function form(Schema $schema): Schema  // NOT Form
  public static function table(Table $table): Table   // Table remains Table
  ```

### Schema vs Form Architecture
- **Form Configuration**: Use `Schema` instead of `Form` for form methods
- **Components**: Keep using `Forms\Components\` for form elements
- **Utilities**: Use `Filament\Schemas\Components\Utilities\Set` and `Get`
- **TextEntry**: Use `Filament\Infolists\Components\TextEntry` for read-only fields
- **String Helper**: Use `str($state)->slug()` instead of `Str::slug()`

### Action Structure Changes
- **New Action Imports**:
  ```php
  use Filament\Actions\BulkActionGroup;
  use Filament\Actions\DeleteAction;
  use Filament\Actions\EditAction;
  use Filament\Actions\ViewAction;
  ```
- **Action Methods**: Use `recordActions()` and `toolbarActions()` instead of `actions()` and `bulkActions()`
- **RelationManagers**: Form method uses `Schema` parameter, table method uses `Table`

### Code Quality Best Practices
- **Dedicated Classes**: Use separate classes for complex configurations:
  - `Schemas/` for form schemas
  - `Tables/` for table configurations
  - `Actions/` for custom actions
  - `Pages/` for resource pages
  - `RelationManagers/` for relationships

- **Early Returns**: Always use early returns for better code readability:
  ```php
  if (! $condition) {
      return;
  }
  // Continue with main logic
  ```

### Filament 4 Core Concepts
- **Server-Driven UI (SDUI)**: Define interfaces entirely in PHP using structured configuration
- **Component-Based**: Use built-in components (forms, tables, actions) for rapid development
- **Declarative Configuration**: Leverage PHP classes for UI definition without custom JavaScript
- **Utility Injection**: Actions support dynamic configuration through context injection

### Translation Support
- All user-facing strings must use `__('package::key')` format
- Organize translation keys by resource/feature
- Support both form field labels and help text translations

## Notes

- Package namespace: `LucaLongo\LaravelLicensingFilamentManager`
- Built for Filament 4.x compatibility with proper type definitions
- Extends the base `laravel-licensing` package with Filament UI components
- Uses standard Laravel package conventions and follows Spatie's package template
- Implements Filament 4 best practices for resource organization and code quality
- Update the package overview to explain that this is a package to integrare in a Filament panel all features to manage license scopes, licenses, etc.
- Please remember to read:
- the documentation at https://github.com/masterix21/laravel-licensing/tree/main/docs
- the AI specifications at: https://github.com/masterix21/laravel-licensing/blob/main/AI_GUIDELINES.md