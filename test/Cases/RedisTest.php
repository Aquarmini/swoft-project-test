<?php

namespace Swoft\Test\Cases;

use Swoft\Redis\Redis;
use Swoft\Test\AbstractTestCase;

class RedisTest extends AbstractTestCase
{
    public function testRedisSet()
    {
        /** @var Redis $res */
        $redis = bean(Redis::class);
        $res = $redis->set('swoft:string', 'xxx', 600);
        $this->assertTrue($res);
    }
}