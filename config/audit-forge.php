<?php

return[
    /*
    |--------------------------------------------------------------------------
    | Audit Events Configuration
    |--------------------------------------------------------------------------
    |
    | Define the database connection, table, and primary key for logging audit
    | events. Customize the connection and table name using environment
    | variables.
    |
    */
    'audit_events' => [
        'connection'  => env('DB_AUDIT_CONNECTION', 'mysql'),
        'table'       => env('DB_AUDIT_EVENTS_TABLE', 'audit_events'),
        'primary_key' => 'id',
    ],

    
    /*
    |--------------------------------------------------------------------------
    | Audit Route Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for auditing HTTP routes and methods. Enable or disable
    | auditing routes, specify a table, and define routes or methods to ignore.
    |
    */
    'audit_route' => [
        'enabled'     => true,
        'table'       => env('DB_AUDIT_ROUTES_TABLE', 'audit_routes'),
        'primary_key' => 'id',
        'ignore_routes' => [
            // Add routes to ignore here, e.g., '/admin', '*admin*'
        ],
        'ignore_methods' => [
            // Add HTTP methods to ignore here, e.g., 'GET'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Table Configuration
    |--------------------------------------------------------------------------
    |
    | Define the user-related table and key settings. These settings are used
    | to link audit logs to specific users in your system.
    |
    */
    'user' => [
        'table'       => 'users',
        'primary_key' => 'id',
        'foreign_key' => 'user_id',
        'key_type'    => 'int'
    ],

    /*
    |--------------------------------------------------------------------------
    | Use Jobs for Audit Logs
    |--------------------------------------------------------------------------
    |
    | Enable or disable the use of Laravel Jobs for processing audit logs. This
    | can help offload the logging process to a background queue.
    |
    */
    'audit_use_jobs' => env('AUDIT_USE_JOBS', false),
];