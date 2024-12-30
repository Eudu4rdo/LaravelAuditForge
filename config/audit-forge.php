<?php

return[
    'audit_events' => [
        'connection' => env('DB_AUDIT_CONNECTION', 'mysql'),
        'table'      => env('DB_AUDIT_table', 'audit_events'),
        'primary_key' => 'id',
    ],

    'user' => [
        'table'       => 'users',
        'primary_key' => 'id',
        'foreign_key' => 'user_id',
        'key_type'    => 'int'
    ],
    'audit_use_jobs' => env('AUDIT_USE_JOBS', false)
];