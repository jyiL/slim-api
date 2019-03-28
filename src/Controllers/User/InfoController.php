<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/28
 * Time: 6:09 PM
 */

namespace Controllers\User;

use Slim\Http\Request;
use Slim\Http\Response;
use Interop\Container\ContainerInterface;

class InfoController
{
    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        return $response->withJson([
            'name' => 'Tom',
            'sex' => 'man'
        ], 200);
    }
}