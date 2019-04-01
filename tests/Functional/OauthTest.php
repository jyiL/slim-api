<?php
/**
 * Created by PhpStorm.
 * User: jyl
 * Date: 2019/4/1
 * Time: 5:27 PM
 */

namespace Tests\Functional;

class OauthTest extends BaseTestCase
{
    /**
     * Test authorization
     */
    public function testAuthorization()
    {
        $response = $this->runApp('GET', '/api/oauth/authorization');

        $this->assertEquals(200, $response->getStatusCode());
    }
}