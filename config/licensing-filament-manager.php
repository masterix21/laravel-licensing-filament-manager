<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Licensed Entities
    |--------------------------------------------------------------------------
    |
    | Define the models that can be used as licensed entities.
    | These models will appear in the licensable select fields.
    |
    | Each entry should map a model class to its display configuration:
    | - 'model' => The fully qualified class name
    | - 'title' => The attribute to display in selects (default: 'name')
    | - 'search' => Array of attributes to search (default: ['name'])
    |
    */
    'licensed_entities' => [
        // Example configuration:
        // App\Models\User::class => [
        //     'title' => 'name',
        //     'search' => ['name', 'email'],
        // ],
        // App\Models\Team::class => [
        //     'title' => 'name',
        //     'search' => ['name'],
        // ],
    ],
];