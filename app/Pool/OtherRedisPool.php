<?php

namespace App\Pool;

use App\Pool\Config\OtherRedisPoolConfig;
use Swoft\Redis\Pool\RedisPool;
use Swoft\Bean\Annotation\Pool;
use Swoft\Bean\Annotation\Inject;

/**
 * Class OtherRedisPool
 * @Pool
 * @package App\Pool
 */
class OtherRedisPool extends RedisPool
{
    /**
     * Config
     *
     * @Inject()
     * @var OtherRedisPoolConfig
     */
    protected $poolConfig;
}