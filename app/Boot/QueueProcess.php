<?php


namespace App\Boot;

use App\Core\Queue\Queue;
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
class QueueProcess implements ProcessInterface
{
    public function run(SwoftProcess $process)
    {
        $queue = Queue::instance();
        $queue->run();
    }

    public function check(): bool
    {
        return true;
    }
}