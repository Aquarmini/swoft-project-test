<?php

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
    public $serviceName = "demoService";
}