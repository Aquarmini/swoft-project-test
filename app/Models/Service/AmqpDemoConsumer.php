<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Models\Service;

use Swoft\App;
use Swoft\Redis\Redis;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Consumer;
use Swoftx\Amqplib\Pool\RabbitMQPool;

class AmqpDemoConsumer extends Consumer
{
    protected $exchange = 'test';

    protected $queue = 'test';

    protected $routingKey = 'test';

    protected function getConnection(): Connection
    {
        $pool = App::getPool(RabbitMQPool::class);
        return $pool->getConnection()->getConnection();
    }

    public function handle($data): bool
    {
        $file = alias('@runtime/' . $data['id']);
        file_put_contents($file, $data['id']);
        $redis = bean(Redis::class);
        echo $redis->incr('amqp:consumer') . PHP_EOL;
        return true;
    }
}
