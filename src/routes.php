<?php

use Slim\Http\Request;
use Slim\Http\Response;

use Middlewares\AuthMiddleware;

// Routes

//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});

$app->group('/api', function () {
    $this->group('/oauth', function () {
        $this->get('/authorization', '\Controllers\Oauth\AuthorizationController');
    });

    $this->group('/user', function () {
        $this->get('/info', '\Controllers\User\InfoController');
    })->add(AuthMiddleware::class);
});