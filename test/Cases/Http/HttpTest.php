<?php
// +----------------------------------------------------------------------
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
        $res = $this->json('POST', '/orm/user/1');
        $res = json_decode($res->getBody()->getContents(), true);

        print_r($res);
        $this->assertEquals(0, $res['code']);
        $this->assertEquals('Swoft', $res['data']['name']);
    }
}