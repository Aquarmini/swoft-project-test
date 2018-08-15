<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
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
