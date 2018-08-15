<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases;

use Swoft\Db\Pool\DbPool;
use Swoft\Db\Pool\DbSlavePool;
use Swoft\Test\AbstractTestCase;

class PoolTest extends AbstractTestCase
{
    public function testPoolName()
    {
        $pool = bean(DbPool::class);
        $this->assertEquals('default.master', $pool->getPoolConfig()->getName());

        $pool = bean(DbSlavePool::class);
        $this->assertEquals('default.slave', $pool->getPoolConfig()->getName());
    }
}
