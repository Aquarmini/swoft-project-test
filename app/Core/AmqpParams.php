<?php
/**
 * Created by PhpStorm.
 * User: limx
 * Date: 2018/11/30
 * Time: 11:56 AM
 */

namespace App\Core;

use Swoftx\Amqplib\Params;
use Swoft\Bean\Annotation\Bean;

/**
 * @Bean
 */
class AmqpParams extends Params
{
    protected $heartbeat = 0;
}
