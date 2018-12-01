<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Boot;

use App\Models\Service\AmqpDemoConsumer;
use Swoft\App;
use Swoft\Process\Bean\Annotation\Process;
use Swoft\Process\Process as SwoftProcess;
use Swoft\Process\ProcessInterface;

/**
 * @Process(boot=true)
 */
class AmqpDemoProcess implements ProcessInterface
{
    public function run(SwoftProcess $process)
    {
        AmqpDemoConsumer::make()->consume();
    }

    public function check(): bool
    {
        return true;
    }
}
