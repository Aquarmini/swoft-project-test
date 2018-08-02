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
    protected $poolName = OtherRedisPool::class;
}