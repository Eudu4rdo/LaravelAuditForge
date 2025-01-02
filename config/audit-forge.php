<?php

return[
    'audit_events' => [
        'connection'  => env('DB_AUDIT_CONNECTION', 'mysql'),
        'table'       => env('DB_AUDIT_EVENTS_TABLE', 'audit_events'),
        'primary_key' => 'id',
    ],

    'user' => [
        'table'       => 'users',
        'primary_key' => 'id',
        'foreign_key' => 'user_id',
        'key_type'    => 'int'
    ],

    'audit_route' => [
        'enabled'     => true,
        'table'       => env('DB_AUDIT_ROUTES_TABLE', 'audit_routes'),
        'primary_key' => 'id',
    ],

    'audit_use_jobs' => env('AUDIT_USE_JOBS', false),
];