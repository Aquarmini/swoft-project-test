<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases;

use Swoft\Test\AbstractTestCase;

class HttpTest extends AbstractTestCase
{
    public function testHttpIndex()
    {
        $res = $this->json('POST', '/');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals('Swoft', $res['data']['name']);
    }

    public function testHttpUser()
    {
        $res = $this->json('GET', '/orm/user/1');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals('limx', $res['data']['name']);
    }

    public function testAspect()
    {
        $res = $this->json('GET', '/aop');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals('2.0.0@beta', $res['data']);
    }

    public function testJsonBigInt()
    {
        $res = $this->json('GET', '/test/json/bigint');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals('中文', $res['data']['str']);
        $this->assertEquals('1111111111111111111111', $res['data']['bigint']);
    }
}
