<?php

namespace App\Pool\Config;

use Swoft\Redis\Pool\Config\RedisPoolConfig;
use Swoft\Bean\Annotation\Bean;

/**
 * Class OtherRedisPoolConfig
 * @Bean
 * @package App\Pool\Config
 */
class OtherRedisPoolConfig extends RedisPoolConfig
{
    /**
     * the name of pool
     *
     * @var string
     */
    protected $name = 'redis.other';

    /**
     * the index of redis db
     *
     * @var int
     */
    protected $db = 1;
}