<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/4/1
 * Time: 2:47 PM
 */

namespace Handlers\Exception;

use Slim\Http\Request;
use Slim\Http\Response;

class CustomNotAllowedHandler extends Error
{
    public function __invoke(Request $request, Response $response, $methods)
    {
        $this->ci['logger']->error('Method must be one of: ' . implode(', ', $methods));
        return $response->withJson([
            'message' => 'Method must be one of: ' . implode(', ', $methods),
        ], 405);
    }
}