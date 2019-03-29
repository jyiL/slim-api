<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/3/28
 * Time: 6:09 PM
 */

namespace Controllers\User;

use Models\Member;
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

    /**
     * @OA\Get(
     *   path="/api/user/info/{id}",
     *   tags={"User"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     description="user id",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Parameter(
     *     name="authorization",
     *     in="header",
     *     required=true,
     *     description="Authorization",
     *     @OA\Schema(type="string")
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="An json resource",
     *   ),
     *   @OA\Response(
     *     response=404,
     *     description="An json resource",
     *   ),
     *   @OA\SecurityScheme(
     *     type="apiKey",
     *     in="header",
     *     securityScheme="api_key",
     *     name="api_key"
     *   )
     * )
     */
    public function __invoke(Request $request, Response $response, $args)
    {
        $route = $request->getAttribute('route');
        $id = $route->getArgument('id');
        $info = Member::query()->find($id);

        if (!$info) return $response->withJson([
            'message' => 'Not Found',
        ], 404);

        return $response->withJson($info->toArray(), 200);
    }
}