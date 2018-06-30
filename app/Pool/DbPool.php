<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Pool;

use Swoft\Bean\Annotation\Pool;
use Swoft\Db\Pool\DbPool as SwoftDbPool;
use Xin\Swoft\Db\Pool\CreateConnectionTrait;

/**
 * OtherDbPool
 *
 * @Pool("default.master")
 */
class DbPool extends SwoftDbPool
{
    use CreateConnectionTrait;
}
