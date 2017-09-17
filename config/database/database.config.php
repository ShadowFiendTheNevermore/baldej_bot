<?php 

return  [
    'mysql' => [
        'driver'    => 'mysql',
        'host'      => env('DB_HOST', '127.0.0.1'),
        'database'  => env('DB_NAME','app_db'),
        'username'  => env('DB_USERNAME','root'),
        'password'  => env('DB_PASSWD','root'),
        'charset'   => env('DB_CHARSET','utf8'),
        'collation' => 'utf8_general_ci',
        'prefix'    => env('DB_PREFIX',''),
    ],
    'pgsql' => [
        'driver'    => 'pgsql',
        'host'      => env('DB_HOST', '127.0.0.1'),
        'port'      => env('DB_PORT', '5432'),
        'database'  => env('DB_NAME','app_db'),
        'username'  => env('DB_USERNAME','root'),
        'password'  => env('DB_PASSWD','root'),
        'charset'   => env('DB_CHARSET','utf8'),
        'prefix'    => env('DB_PREFIX',''),
        'schema'    => env('DB_SCHEMA','public'),
        'sslmode'   => env('DB_SSL','prefer')
    ]
];


