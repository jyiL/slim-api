<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/28
 * Time: 3:41 PM
 */

namespace Controllers\Oauth;

use Slim\Http\Request;
use Slim\Http\Response;
use Interop\Container\ContainerInterface;
use OpenApi\Annotations as OA;

class AuthorizationController
{
    protected $ci;

    public function __construct(ContainerInterface $ci)
    {
        $this->ci = $ci;
    }

    /**
     * @OA\Get(
     *   path="/api/oauth/authorization",
     *   tags={"Oauth"},
     *   @OA\Response(
     *     response=200,
     *     description="An json resource",
     *   ),
     *   @OA\Response(
     *     response=401,
     *     description="An json resource",
     *   ),
     * )
     */
    public function __invoke(Request $request, Response $response, $args)
    {
        //your code
        //to access items in the container... $this->ci->get('');

        $jwt = $this->ci->get('jwt');
        $token = $jwt->create(['uid' => 1]);

        return $response->withJson([
            'access_token' => (string)$token,
            'expires_in' => $jwt->expiration
        ], 200);
    }
}