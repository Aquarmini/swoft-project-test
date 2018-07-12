<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Fallback;

use App\Lib\Demo2ServiceInterface;
use Swoft\Sg\Bean\Annotation\Fallback;
use Swoft\Core\ResultInterface;

/**
 * Class DemoServiceFallback
 * @Fallback("demo2Fallback")
 * @method ResultInterface deferVersion
 * @package App\Fallback
 */
class Demo2ServiceFallback implements Demo2ServiceInterface
{
    public function version()
    {
        return '2.0.0.fallback';
    }
}
