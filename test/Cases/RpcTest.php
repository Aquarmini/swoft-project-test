<?php

namespace Swoft\Test\Cases;

use Swoft\Test\AbstractTestCase;

class RpcTest extends AbstractTestCase
{
    public function testRpcVersion()
    {
        $res = $this->json('GET', '/rpc/version');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals('1.0.0', $res['data']);
    }

    public function testRpcUser()
    {
        $res = $this->json('GET', '/rpc/user/2');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals(2, $res['data']['id']);
    }
}