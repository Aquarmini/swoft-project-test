<?php


namespace App\Models\Service;

use App\Core\AmqpConnection;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Publisher;

class AmqpDemoPublisher extends Publisher
{
    protected $exchange = 'test';

    protected $routingKey = 'test';

    protected function getConnection(): Connection
    {
        return bean(AmqpConnection::class)->build();
    }
}