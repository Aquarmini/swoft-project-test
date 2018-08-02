<?php
namespace App\Biz\Test;

use App\Lib\DemoServiceInterface;
use Swoft\Bean\Annotation\Bean;
use Swoft\Rpc\Client\Bean\Annotation\Reference;

/**
 * Class DemoClient
 * @Bean
 * @package App\Biz\Test
 */
class DemoClient
{
    /**
     * @Reference(name="demo", fallback="demoFallback")
     * @var DemoServiceInterface
     */
    protected $service;

    public function __call($name, $arguments)
    {
        return $this->service->$name(...$arguments);
    }
}