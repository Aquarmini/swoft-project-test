<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Core;

use Swoft\Bean\Annotation\Bean;

/**
 * Class Demo
 * @Bean
 * @package App\Core
 */
class Demo
{
    public $version = '1.0.0';

    /**
     * 测试Aop
     * @author limx
     * @return string
     */
    public function version()
    {
        return $this->version;
    }
}
