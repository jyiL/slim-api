<?php

use Slim\Http\Request;
use Slim\Http\Response;

use Middlewares\AuthMiddleware;

/**
 * @OA\Info(title="Slim API", version="1.0")
 */

// Routes

//$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});

$app->group('/api', function () {
    /**
     * @OA\Tag(name="Oauth")
     */
    $this->group('/oauth', function () {
        $this->get('/authorization', '\Controllers\Oauth\AuthorizationController');
    });

    /**
     * @OA\Tag(name="User")
     */
    $this->group('/user', function () {
        $this->get('/info/{id}', '\Controllers\User\InfoController');
    })->add(AuthMiddleware::class);

    $this->get('/swagger', function (Request $request, Response $response, array $args) {
        return file_get_contents('../public/openapi.yaml');
    });
});