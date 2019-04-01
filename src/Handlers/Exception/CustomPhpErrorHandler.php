<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/30
 * Time: 1:24 PM
 */

namespace Handlers\Exception;

use Slim\Http\Request;
use Slim\Http\Response;

class CustomPhpErrorHandler extends Error
{
    public function __invoke(Request $request, Response $response, $exception)
    {
        $this->ci['logger']->error($exception->getMessage());
        return $response->withJson([
            'message' => $exception->getMessage() . 'Something went wrong!',
        ], 500);
    }
}