<?php


namespace App\Models\Service;

use App\Core\AmqpConnection;
use Swoft\App;
use Swoft\Redis\Redis;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Consumer;
use Swoftx\Amqplib\Message\Publisher;
use Swoftx\Amqplib\Pool\RabbitMQPool;

class AmqpDemoConsumer extends Consumer
{
    protected $exchange = 'test';

    protected $queue = 'test';

    protected $routingKey = 'test';

    protected function getConnection(): Connection
    {
        $pool = App::getPool(RabbitMQPool::class);
        /** @var AmqpConnection $conn */
        return $pool->getConnection()->getConnection();
        return bean(AmqpConnection::class)->build();
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
