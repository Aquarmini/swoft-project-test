<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Process;

use Swoft\Core\Coroutine;
use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;
use Swoft\Redis\Redis;

/**
 *
 * Class TestProcess - Custom process
 *
 * @Process(name="test2", coroutine=true)
 * @package App\Process
 */
class Test2Process implements ProcessInterface
{
    const REDIS_KEY = 'boot:process2';

    public function run(SwoftProcess $process)
    {
        /** @var Redis $redis */
        $redis = bean(Redis::class);
        $redis->set(static::REDIS_KEY, '1');
    }

    public function check(): bool
    {
        return true;
    }
}
