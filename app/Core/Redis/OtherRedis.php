<?php

namespace App\Core\Redis;

use App\Pool\OtherRedisPool;
use Swoft\App;
use Swoft\Pool\ConnectionInterface;
use Swoft\Pool\PoolInterface;
use Swoft\Redis\Redis as SwoftRedis;
use Swoft\Bean\Annotation\Bean;
use Swoft\Redis\RedisConnection;

/**
 * Class OtherRedis
 * @Bean
 * @package App\Core\Redis
 */
class OtherRedis extends SwoftRedis
{
    /**
     * @var string
     */
    private $poolName = OtherRedisPool::class;

    /**
     * defer call
     *
     * @param string $method
     * @param array  $params
     *
     * @return ResultInterface
     */
    public function deferCall(string $method, array $params)
    {
        $connectPool = App::getPool($this->poolName);

        /* @var $client RedisConnection */
        $client = $connectPool->getConnection();
        $client->setDefer();
        $result = $client->$method(...$params);

        return $this->getResult($client, $result);
    }

    /**
     * call method by redis client
     *
     * @param string $method
     * @param array  $params
     *
     * @return mixed
     */
    public function call(string $method, array $params)
    {
        /* @var PoolInterface $connectPool */
        $connectPool = App::getPool($this->poolName);
        /* @var ConnectionInterface $client */
        $connection = $connectPool->getConnection();
        $result     = $connection->$method(...$params);
        $connection->release(true);

        return $result;
    }
}