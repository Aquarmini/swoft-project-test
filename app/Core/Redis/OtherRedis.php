<?php

namespace App\Core\Redis;

use App\Pool\OtherRedisPool;
use Swoft\Redis\Redis as SwoftRedis;
use Swoft\Bean\Annotation\Bean;

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
}