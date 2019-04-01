<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/30
 * Time: 1:24 PM
 */

namespace Handlers\Exception;

class CustomPhpErrorHandler extends Error
{
    public function __invoke($request, $response, $error)
    {
        $this->ci['logger']->error($error);
        return $response->withJson([
            'message' => 'Something went wrong!',
        ], 500);
    }
}