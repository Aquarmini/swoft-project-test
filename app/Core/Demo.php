<?php
namespace App\Core;

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Cacheable;

/**
 * Class Demo
 * @Bean
 * @package App\Core
 */
class Demo
{
    /**
     * 测试Aop
     * @author limx
     * @return string
     */
    public function version()
    {
        return '1.0.0';
    }
}