<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Lib;

use Swoft\Core\ResultInterface;

/**
 * Interface DemoServiceInterface
 * @package App\Lib
 * @method ResultInterface deferVersion()
 * @method ResultInterface deferThrowException()
 */
interface Demo2ServiceInterface
{
    public function version();

    public function throwException();
}
