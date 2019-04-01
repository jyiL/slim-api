<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/4/1
 * Time: 2:48 PM
 */

namespace Handlers\Exception;

use Slim\Http\Request;
use Slim\Http\Response;

class CustomNotFoundHandler extends Error
{
    public function __invoke(Request $request, Response $response)
    {
        return $response->withJson([
            'message' => 'Something went wrong!',
        ], 404);
    }
}