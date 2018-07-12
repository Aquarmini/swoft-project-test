<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
// | OrmTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
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
}
