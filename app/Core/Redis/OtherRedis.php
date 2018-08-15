<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Core\Redis;

use App\Pool\OtherRedisPool;
use Swoft\App;
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
    protected $poolName = OtherRedisPool::class;
}
