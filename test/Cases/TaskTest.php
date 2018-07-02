<?php

namespace Swoft\Test\Cases;

use Swoft\Redis\Redis;
use Swoft\Task\Task;
use Swoft\Test\AbstractTestCase;

class TaskTest extends AbstractTestCase
{
    public function testTaskDeliver()
    {
        $redis = bean(Redis::class);
        $key = 'task:test';
        $val = 'success';
        $redis->del($key);

        $res = Task::deliver('test', 'work', [$key, $val]);
        $this->assertTrue($res);

        $res = $redis->exists($key);
        $this->assertTrue(empty($res));

        sleep(2);

        $res = $redis->exists($key);
        $this->assertTrue($res > 0);
    }
}