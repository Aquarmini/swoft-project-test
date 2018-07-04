<?php

namespace Swoft\Test\Cases;

use App\Boot\TestProcess;
use App\Core\Queue\Queue;
use App\Jobs\TestJob;
use App\Models\Entity\User;
use App\Process\Test2Process;
use Swoft\Process\ProcessBuilder;
use Swoft\Redis\Redis;
use Swoft\Task\Task;
use Swoft\Test\AbstractTestCase;

class ProcessTest extends AbstractTestCase
{
    public function testBootProcess()
    {
        /** @var Redis $redis */
        $redis = bean(Redis::class);
        $redis->del(TestProcess::REDIS_KEY);
        $this->assertEquals(0, $redis->exists(TestProcess::REDIS_KEY));

        sleep(2);

        $this->assertEquals(1, $redis->exists(TestProcess::REDIS_KEY));
    }

    public function testProcess()
    {
        /** @var Redis $redis */
        $redis = bean(Redis::class);
        $redis->del(Test2Process::REDIS_KEY);

        sleep(2);
        $this->assertEquals(0, $redis->exists(Test2Process::REDIS_KEY));

        ProcessBuilder::create('test2')->start();
        sleep(2);

        $this->assertEquals(1, $redis->exists(Test2Process::REDIS_KEY));
    }
}