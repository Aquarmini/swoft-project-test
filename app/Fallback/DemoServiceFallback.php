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

use App\Lib\DemoServiceInterface;
use Swoft\Sg\Bean\Annotation\Fallback;
use Swoft\Core\ResultInterface;

/**
 * Class DemoServiceFallback
 * @Fallback("demoFallback")
 * @method ResultInterface deferVersion
 * @package App\Fallback
 */
class DemoServiceFallback implements DemoServiceInterface
{
    public function version()
    {
        return '1.0.0.fallback';
    }
}
