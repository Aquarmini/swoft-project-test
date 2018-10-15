<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Services;

use App\Core\Constants\ErrorCode;
use App\Exception\HttpServerException;
use App\Lib\Demo2ServiceInterface;
use Swoft\Rpc\Server\Bean\Annotation\Service;
use Swoft\Core\ResultInterface;

/**
 * Class DemoService
 * @Service()
 * @method ResultInterface deferVersion()
 * @method ResultInterface deferThrowException()
 * @package App\Services
 */
class Demo2Service implements Demo2ServiceInterface
{
    public function version()
    {
        return '2.0.0';
    }

    public function throwException()
    {
        throw new HttpServerException(ErrorCode::$ENUM_PARAMS_ERROR, '自定义错误');
    }
}
