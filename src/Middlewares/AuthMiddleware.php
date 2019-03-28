<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/28
 * Time: 5:44 PM
 */

namespace Middlewares;

use Interop\Container\ContainerInterface;

class AuthMiddleware
{
    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    public function __invoke($request, $response, $next)
    {
        $jwt = $this->ci->get('jwt');

        $authorizationToken = $request->getHeader('Authorization');

        if (is_array($authorizationToken)) $authorizationToken = array_shift($authorizationToken);


        if (empty($authorizationToken))
            return $response->withJson([
            'message' => 'No token Provided。'
        ], 401);

        $validate = $jwt->validate(trim(str_replace('Bearer ', '', $authorizationToken)));

        if ($validate === 1) return $response->withJson([
            'message' => 'Fail On Token'
        ], 401);

        if (!$validate) return $response->withJson([
            'message' => 'Token has expired'
        ], 401);

        $response = $next($request, $response);
        return $response;
    }
}