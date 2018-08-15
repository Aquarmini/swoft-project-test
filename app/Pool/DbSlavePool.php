<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Pool;

use Swoft\Bean\Annotation\Pool;
use Swoft\Db\Pool\DbSlavePool as SwoftDbSlavePool;
use Xin\Swoft\Db\Pool\CreateConnectionTrait;

/**
 * OtherDbSlavePool
 *
 * @Pool("bdModel.slave")
 */
class DbSlavePool extends SwoftDbSlavePool
{
    use CreateConnectionTrait;
}
