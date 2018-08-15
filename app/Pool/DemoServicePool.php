<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Pool;

use App\Pool\Config\DemoServicePoolConfig;
use Swoft\Bean\Annotation\Inject;
use Swoft\Bean\Annotation\Pool;
use Swoft\Rpc\Client\Pool\ServicePool as SwoftServicePool;

/**
 * the pool of user service
 *
 * @Pool(name="demo")
 */
class DemoServicePool extends SwoftServicePool
{
    /**
     * @Inject()
     *
     * @var DemoServicePoolConfig
     */
    protected $poolConfig;
}
