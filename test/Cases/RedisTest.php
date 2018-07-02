<?php

namespace Swoft\Test\Cases;

use Swoft\Redis\Redis;
use Swoft\Test\AbstractTestCase;

class RedisTest extends AbstractTestCase
{
    public function testRedisSet()
    {
        /** @var Redis $redis */
        $redis = bean(Redis::class);
        $res = $redis->set('swoft:string', 'xxx', 600);
        $this->assertTrue($res);

        $res = $redis->get('swoft:string');
        $this->assertEquals('xxx', $res);

        $res = $redis->ttl('swoft:string');
        $this->assertEquals(600, $res);
    }
}