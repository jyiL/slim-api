<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/30
 * Time: 5:10 PM
 */

$settings = require __DIR__ . '/src/settings.php';
$app = new \Slim\App($settings);

// Service factory for the ORM
$container = $app->getContainer();

return [
    'driver' => $container['settings']['doctrine']['connection']['driver'],
    'host' => $container['settings']['doctrine']['connection']['host'],
    'port' => $container['settings']['doctrine']['connection']['port'],
    'user' => $container['settings']['doctrine']['connection']['user'],
    'password' => $container['settings']['doctrine']['connection']['password'],
    'dbname' => $container['settings']['doctrine']['connection']['dbname'],
];