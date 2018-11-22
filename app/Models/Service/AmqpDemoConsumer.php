<?php


namespace App\Models\Service;

use App\Core\AmqpConnection;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Consumer;
use Swoftx\Amqplib\Message\Publisher;

class AmqpDemoConsumer extends Consumer
{
    protected $exchange = 'test';

    protected $queue = 'test';

    protected $routingKey = 'test';

    protected function getConnection(): Connection
    {
        return bean(AmqpConnection::class)->build();
    }

    public function handle($data): bool
    {
        $file = alias('@runtime/' . $data['id']);
        file_put_contents($file, $data['id']);
        return true;
    }
}