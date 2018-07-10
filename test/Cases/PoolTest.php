<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
// | OrmTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Swoft\Test\Cases;

use App\Models\Entity\EventUser;
use App\Models\Entity\User;
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
