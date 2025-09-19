<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use LucaLongo\LaravelLicensingFilamentManager\Filament\Forms\Components\LicenseablePicker;
use Illuminate\Database\Eloquent\Model;

uses(RefreshDatabase::class);

beforeEach(function () {
    // Create test tables
    $this->app['db']->connection()->getSchemaBuilder()->create('test_users', function ($table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->timestamps();
    });

    $this->app['db']->connection()->getSchemaBuilder()->create('test_products', function ($table) {
        $table->id();
        $table->string('title');
        $table->string('sku');
        $table->text('description')->nullable();
        $table->timestamps();
    });

    // Define test models
    if (!class_exists('TestUserModel')) {
        eval('
            class TestUserModel extends \Illuminate\Database\Eloquent\Model {
                protected $table = "test_users";
                protected $fillable = ["name", "email"];
                public $timestamps = true;
            }
        ');
    }

    if (!class_exists('TestProductModel')) {
        eval('
            class TestProductModel extends \Illuminate\Database\Eloquent\Model {
                protected $table = "test_products";
                protected $fillable = ["title", "sku", "description"];
                public $timestamps = true;
            }
        ');
    }

    // Seed test data
    TestUserModel::create(['name' => 'John Doe', 'email' => 'john@example.com']);
    TestUserModel::create(['name' => 'Jane Smith', 'email' => 'jane@example.com']);
    TestUserModel::create(['name' => 'Bob Johnson', 'email' => 'bob@example.com']);

    TestProductModel::create(['title' => 'Product A', 'sku' => 'SKU-001', 'description' => 'First product']);
    TestProductModel::create(['title' => 'Product B', 'sku' => 'SKU-002', 'description' => 'Second product']);
    TestProductModel::create(['title' => 'Product C', 'sku' => 'SKU-003', 'description' => 'Third product']);
});

it('loads available model types', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'name',
            'search' => ['name', 'email'],
        ],
        'TestProductModel' => [
            'title' => 'title',
            'search' => ['title', 'sku'],
        ],
    ]);

    $component = LicenseablePicker::make('licenseable');

    expect($component)->toBeInstanceOf(LicenseablePicker::class);
});

it('searches users by name', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'name',
            'search' => ['name'],
        ],
    ]);

    $users = TestUserModel::where('name', 'like', '%Jane%')->pluck('name', 'id');

    expect($users)->toHaveCount(1);
    expect($users->first())->toBe('Jane Smith');
});

it('searches users by email', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'name',
            'search' => ['email'],
        ],
    ]);

    $users = TestUserModel::where('email', 'like', '%jane%')->pluck('name', 'id');

    expect($users)->toHaveCount(1);
    expect($users->first())->toBe('Jane Smith');
});

it('searches products by title', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestProductModel' => [
            'title' => 'title',
            'search' => ['title'],
        ],
    ]);

    $products = TestProductModel::where('title', 'like', '%Product%')->pluck('title', 'id');

    expect($products)->toHaveCount(3);
});

it('searches products by SKU', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestProductModel' => [
            'title' => 'title',
            'search' => ['sku'],
        ],
    ]);

    $products = TestProductModel::where('sku', 'like', '%SKU-002%')->pluck('title', 'id');

    expect($products)->toHaveCount(1);
    expect($products->first())->toBe('Product B');
});

it('searches with multiple attributes', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'name',
            'search' => ['name', 'email'],
        ],
    ]);

    // Search by name
    $usersByName = TestUserModel::where('name', 'like', '%Smith%')
        ->orWhere('email', 'like', '%Smith%')
        ->pluck('name', 'id');

    expect($usersByName)->toHaveCount(1);

    // Search by email
    $usersByEmail = TestUserModel::where('name', 'like', '%example.com%')
        ->orWhere('email', 'like', '%example.com%')
        ->pluck('name', 'id');

    expect($usersByEmail)->toHaveCount(3);
});

it('limits search results to 50', function () {
    // Create many records
    for ($i = 1; $i <= 60; $i++) {
        TestUserModel::create([
            'name' => "User {$i}",
            'email' => "user{$i}@example.com",
        ]);
    }

    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'name',
            'search' => ['name'],
        ],
    ]);

    $users = TestUserModel::where('name', 'like', '%User%')
        ->limit(50)
        ->pluck('name', 'id');

    expect($users)->toHaveCount(50);
});

it('finds record by ID for option label', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'name',
            'search' => ['name', 'email'],
        ],
    ]);

    $user = TestUserModel::first();
    $foundUser = TestUserModel::find($user->id);

    expect($foundUser)->not->toBeNull();
    expect($foundUser->name)->toBe($user->name);
});

it('handles non-existent record ID gracefully', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'name',
            'search' => ['name'],
        ],
    ]);

    $nonExistentUser = TestUserModel::find(99999);

    expect($nonExistentUser)->toBeNull();
});

it('uses custom title attribute', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestUserModel' => [
            'title' => 'email',
            'search' => ['name'],
        ],
    ]);

    $user = TestUserModel::first();

    expect($user->email)->toBe('john@example.com');
});

it('handles empty search results', function () {
    config()->set('licensing-filament-manager.licensed_entities', [
        'TestProductModel' => [
            'title' => 'title',
            'search' => ['title'],
        ],
    ]);

    $products = TestProductModel::where('title', 'like', '%NonExistent%')->pluck('title', 'id');

    expect($products)->toBeEmpty();
});