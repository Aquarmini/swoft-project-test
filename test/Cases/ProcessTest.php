<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases;

use App\Boot\TestProcess;
use App\Process\Test2Process;
use Swoft\Process\ProcessBuilder;
use Swoft\Redis\Redis;
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
