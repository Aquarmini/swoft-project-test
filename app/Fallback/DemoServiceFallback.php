<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
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
 * @method ResultInterface deferBigMessage($str)
 * @method ResultInterface deferGet($id)
 * @package App\Fallback
 */
class DemoServiceFallback implements DemoServiceInterface
{
    public function version()
    {
        return '1.0.0.fallback';
    }

    public function bigMessage($str)
    {
        return 'bigMessageFallBack';
    }

    public function get($id)
    {
        return '';
    }
}
