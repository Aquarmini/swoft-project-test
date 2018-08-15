<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Breaker;

use Swoft\Sg\Bean\Annotation\Breaker;

/**
 * Class DemoServiceBreaker
 * @Breaker("demo")
 * @package App\Breaker
 */
class DemoServiceBreaker extends ServiceBreaker
{
    /**
     * @var string 服务名称
     */
    public $serviceName = 'demoService';
}
