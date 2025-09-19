# Changelog

All notable changes to `laravel-licensing-filament-manager` will be documented in this file.

## 1.0.0 - 2025-09-18

### 🎉 Laravel Licensing Filament Manager v1.0.0

This is the first stable release of the Laravel Licensing Filament Manager package, providing a complete Filament 4.x panel integration for the masterix21/laravel-licensing package.

### ✨ Features

#### Core Functionality

- **📊 Complete License Management** - Full lifecycle control with status tracking
- **🔐 License Scope Management** - Define scopes with automatic key rotation
- **📋 Template System** - Create reusable license configurations with inheritance
- **📱 Usage Tracking** - Real-time monitoring with device fingerprinting
- **🔑 Signing Key Management** - Automatic/manual rotation with revocation support
- **📈 Statistics Dashboard** - Comprehensive analytics with customizable widgets

#### Technical Features

- **🎨 Native Filament 4 Integration** - Seamlessly integrates with existing panels
- **🌍 Multi-language Support** - 9 languages included
- **⚙️ Configurable Entities** - Flexible configuration for licensable models
- **🚀 Bulk Operations** - Efficient management of multiple licenses
- **🔧 Highly Customizable** - Extend resources, widgets, and validation logic

### 🌐 Translations

Complete translations available for:

- 🇬🇧 English
- 🇮🇹 Italian
- 🇪🇸 Spanish
- 🇩🇪 German
- 🇫🇷 French
- 🇷🇺 Russian
- 🇨🇳 Chinese (Simplified)
- 🇮🇳 Hindi
- 🇵🇱 Polish

### 📦 Components

#### Resources

- LicenseResource - Complete license management
- LicenseScopeResource - Scope administration
- LicenseUsageResource - Usage tracking

#### Relation Managers

- LicensesRelationManager
- SigningKeysRelationManager
- TemplatesRelationManager
- UsagesRelationManager
- TrialsRelationManager

#### Widgets

- LicenseStatsOverview
- ExpiringLicenses
- RecentLicenseActivations
- LicenseStatsWidget

### 📋 Requirements

- PHP 8.4+
- Laravel 11.0+ or 12.0+
- Filament 4.0+
- masterix21/laravel-licensing 1.0+

### 🚀 Installation

```bash
composer require lucalongo/laravel-licensing-filament-manager

```
See the [README](https://github.com/masterix21/laravel-licensing-filament-manager) for complete documentation and examples.

### 🙏 Credits

Created and maintained by Luca Longo and all contributors.

### 📄 License

The MIT License (MIT)

**Full Changelog**: https://github.com/masterix21/laravel-licensing-filament-manager/commits/1.0.0
