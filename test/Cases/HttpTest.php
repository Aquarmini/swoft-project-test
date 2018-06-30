<?php
// +----------------------------------------------------------------------
// | OrmTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Swoft\Test\Cases;

use App\Models\Entity\User;

class HttpTest extends AbstractTestCase
{
    public function testHttpIndex()
    {
        $res = $this->json('POST', '/');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals('Swoft', $res['data']['name']);
    }
}