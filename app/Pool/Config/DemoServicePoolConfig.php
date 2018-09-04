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

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;
use Swoftx\Rpc\Pool\Config\ServicePoolConfig;

/**
 * the config of rpc default service
 *
 * @Bean()
 */
class DemoServicePoolConfig extends ServicePoolConfig
{
    /**
     * the name of pool
     *
     *
     * @Value(env="${DEMO_SERVICE_NAME}")
     * @var string
     */
    protected $name = '';

    /**
     * the addresses of connection
     *
     * <pre>
     * [
     *  '127.0.0.1:88',
     *  '127.0.0.1:88'
     * ]
     * </pre>
     *
     * @Value(env="${DEMO_SERVICE_URL}")
     * @var array
     */
    protected $uri = [];
}
