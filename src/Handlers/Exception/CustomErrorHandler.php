<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/30
 * Time: 1:16 PM
 */

namespace Handlers\Exception;

use Slim\Http\Request;
use Slim\Http\Response;

class CustomErrorHandler
{
    public function __invoke(Request $request, Response $response, $args)
    {
        return $response->withJson([
            'message' => 'Something went wrong!',
        ], 500);
    }
}