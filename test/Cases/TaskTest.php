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

use App\Core\Queue\Queue;
use App\Jobs\TestJob;
use App\Models\Entity\User;
use Swoft\Redis\Redis;
use Swoft\Task\Task;
use Swoft\Test\AbstractTestCase;

class TaskTest extends AbstractTestCase
{
    public function testTaskDeliver()
    {
        $redis = bean(Redis::class);
        $key = 'task:test';
        $val = 'success';
        $redis->del($key);

        $res = Task::deliver('test', 'work', [$key, $val]);
        $this->assertTrue($res);

        $res = $redis->exists($key);
        $this->assertTrue(empty($res));

        sleep(2);

        $res = $redis->exists($key);
        $this->assertFalse(empty($res));
    }

    public function testQueue()
    {
        $user = new User();
        $user->setName('xxx' . rand(0, 9999));
        $user->setRoleId(1);
        $id = $user->save()->getResult();
        Queue::instance()->push(new TestJob($id));

        sleep(2);
        $user = User::findById($id)->getResult();
        $this->assertNull($user);
    }
}
