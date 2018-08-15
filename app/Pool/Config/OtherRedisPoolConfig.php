<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
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
