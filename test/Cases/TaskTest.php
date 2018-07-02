<?php

namespace Swoft\Test\Cases;

use Swoft\Redis\Redis;
use Swoft\Task\Task;
use Swoft\Test\AbstractTestCase;

class TaskTest extends AbstractTestCase
{
    public function testTaskDeliver()
    {
        $res = Task::deliver('test', 'work', ['ss', 'vv']);
        $this->assertTrue($res);
    }
}