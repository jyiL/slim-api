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

class CustomErrorHandler extends Error
{
    public function __invoke(Request $request, Response $response, $exception)
    {
        $this->ci['logger']->error($exception->getMessage());
        return $response->withJson([
            'message' => 'Something went wrong!',
        ], 500);
    }
}