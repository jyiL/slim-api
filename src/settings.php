<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // jwt
        'jwt' => [
            'sign' => 'e080ff6a-1cf1-4414-8ac9-71285115fa89',
            'id' => '86d56ebb-1341-4586-8487-07970956c3e6',
            'issuer' => 'http://example.com',
            'audience' => 'http://example.org',
        ],

        // db
        'db' => [
            // pgsql
            'driver' => 'pgsql',
            'host' => 'postgres',
            'port' => '5432',
            'database' => 'jhpm',
            'username' => 'postgres',
            'password' => '12345678',
            'charset'   => 'utf8',
            'prefix'    => '',
            'schema' => 'public',
            'sslmode' => 'prefer',

            // mysql
//            'driver' => 'mysql',
//            'host' => '',
//            'port' => '3306',
//            'database' => '',
//            'username' => '',
//            'password' => '',
//            'charset' => 'utf8',
//            'collation' => 'utf8_unicode_ci',
//            'prefix' => '',
//            'strict' => true,
//            'engine' => null,
        ],

        // cors
        'cors' => [
            'allow-credentials' => false, // set "Access-Control-Allow-Credentials" 👉 string "false" or "true".
            'allow-headers'      => ['*'], // ex: Content-Type, Accept, X-Requested-With
            'expose-headers'     => [],
            'origins'            => ['*'], // ex: http://localhost
            'methods'            => ['*'], // ex: GET, POST, PUT, PATCH, DELETE
            'max-age'            => 0,
        ]
    ],
];
