<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Services;

use App\Lib\DemoServiceInterface;
use Swoft\Rpc\Server\Bean\Annotation\Service;
use Swoft\Core\ResultInterface;

/**
 * Class DemoService
 * @Service()
 * @method ResultInterface deferVersion()
 * @method ResultInterface deferBigMessage($str)
 * @package App\Services
 */
class DemoService implements DemoServiceInterface
{
    public function version()
    {
        return '1.0.0';
    }

    public function bigMessage($str)
    {
        $res = '';
        for ($i = 0; $i < 20000; $i++) {
            $res .= $str;
        }
        return $res;
    }
}
