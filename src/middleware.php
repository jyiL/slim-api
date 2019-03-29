<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);
$container = $app->getContainer();

$app->add(new Medz\Cors\Slim\Cors($container['settings']['cors']));