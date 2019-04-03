<?php

use Symfony\Component\Yaml\Yaml;

$settingValue = Yaml::parseFile(__DIR__ . '/../configurations/settings.yml');

$settingValue['wechat']['log']['file'] = __DIR__ . '/../logs/';

return [
    'settings' => [
        'displayErrorDetails' => file_exists('.develop') ? true : false, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'determineRouteBeforeAppMiddleware' => true,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
//            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'path' => __DIR__ . '/../logs/' . date('Y-m-d') . '.log',
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
        'db' => ['database'],

        // redis
        'redis' => $settingValue['redis'],

        // cors
        'cors' => [
            'allow-credentials' => false, // set "Access-Control-Allow-Credentials" 👉 string "false" or "true".
            'allow-headers'      => ['*'], // ex: Content-Type, Accept, X-Requested-With
            'expose-headers'     => [],
            'origins'            => ['*'], // ex: http://localhost
            'methods'            => ['*'], // ex: GET, POST, PUT, PATCH, DELETE
            'max-age'            => 0,
        ],

        // doctrine
        'doctrine' => $settingValue['doctrine'],

        // wechat
        'wechat' => $settingValue['wechat'],

        // tokenBucket
        'tokenBucket' => [
            'name' => 'slim-token-bucket',
            'bit' => '200',
            'rate' => '50',
        ]
    ],
];
