<?php

namespace LucaLongo\LaravelLicensingFilamentManager\Tests;

use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use BladeUI\Icons\BladeIconsServiceProvider;
use Filament\Actions\ActionsServiceProvider;
use Filament\FilamentServiceProvider;
use Filament\Forms\FormsServiceProvider;
use Filament\Infolists\InfolistsServiceProvider;
use Filament\Notifications\NotificationsServiceProvider;
use Filament\Support\SupportServiceProvider;
use Filament\Tables\TablesServiceProvider;
use Filament\Widgets\WidgetsServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Livewire\LivewireServiceProvider;
use LucaLongo\LaravelLicensingFilamentManager\LaravelLicensingFilamentManagerPlugin;
use LucaLongo\LaravelLicensingFilamentManager\LaravelLicensingFilamentManagerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;
use RyanChandler\BladeCaptureDirective\BladeCaptureDirectiveServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'LucaLongo\\LaravelLicensingFilamentManager\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            ActionsServiceProvider::class,
            BladeCaptureDirectiveServiceProvider::class,
            BladeHeroiconsServiceProvider::class,
            BladeIconsServiceProvider::class,
            FilamentServiceProvider::class,
            FormsServiceProvider::class,
            InfolistsServiceProvider::class,
            LivewireServiceProvider::class,
            NotificationsServiceProvider::class,
            SupportServiceProvider::class,
            TablesServiceProvider::class,
            WidgetsServiceProvider::class,
            LaravelLicensingFilamentManagerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        config()->set('database.connections.testing', [
            'driver' => 'sqlite',
            'database' => ':memory:',
            'prefix' => '',
        ]);

        config()->set('app.key', 'base64:'.base64_encode('32characterrandomstringxxxxxxxx'));

        // Run all licensing migrations
        $migrationFiles = [
            'create_license_scopes_table.php.stub',
            'create_licensing_keys_table.php.stub',
            'create_license_templates_table.php.stub',
            'create_licenses_table.php.stub',
            'create_license_usages_table.php.stub',
            'create_license_trials_table.php.stub',
            'create_license_renewals_table.php.stub',
            'create_license_transfers_table.php.stub',
            'create_license_transfer_histories_table.php.stub',
            'create_license_transfer_approvals_table.php.stub',
            'create_licensing_audit_logs_table.php.stub',
        ];

        foreach ($migrationFiles as $file) {
            $migration = include __DIR__.'/../vendor/masterix21/laravel-licensing/database/migrations/'.$file;
            $migration->up();
        }

        // Create test users table
        $app['db']->connection()->getSchemaBuilder()->create('users', function ($table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Create test licenseable table
        $app['db']->connection()->getSchemaBuilder()->create('test_licenseables', function ($table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
    }
}
