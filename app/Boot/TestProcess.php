<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Boot;

use Swoft\App;
use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;
use Swoft\Redis\Redis;

/**
 *
 * Class TestProcess - Custom process
 *
 * @Process(boot=true)
 * @package App\Process
 */
class TestProcess implements ProcessInterface
{
    const REDIS_KEY = 'boot:process';

    public function run(SwoftProcess $process)
    {
        /** @var Redis $redis */
        $redis = bean(Redis::class);
        while (true) {
            $res = $redis->set(static::REDIS_KEY, '1');
            sleep(1);
        }
    }

    public function check(): bool
    {
        return true;
    }
}
