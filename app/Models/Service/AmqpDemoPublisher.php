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
use Swoft\Pool\ConnectionInterface;
use Swoftx\Amqplib\Connection;
use Swoftx\Amqplib\Message\Publisher;
use Swoftx\Amqplib\Pool\RabbitMQPool;

class AmqpDemoPublisher extends Publisher
{
    protected $exchange = 'test';

    protected $routingKey = 'test';

    /** @var ConnectionInterface */
    protected $swoftConnection;

    protected function getConnection(): Connection
    {
        $pool = App::getPool(RabbitMQPool::class);
        $this->swoftConnection = $pool->getConnection();
        return $this->swoftConnection->getConnection();
    }

    public function publish()
    {
        parent::publish();
        $this->swoftConnection->release(true);
    }
}
