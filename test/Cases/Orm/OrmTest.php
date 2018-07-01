<?php
// +----------------------------------------------------------------------
// | OrmTest.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Swoft\Test\Cases\Http;

use App\Models\Entity\User;
use Swoft\Test\AbstractTestCase;

class OrmTest extends AbstractTestCase
{
    public function testGetUser()
    {
        /** @var User $user */
        $user = User::findById(1)->getResult();

        $this->assertEquals('limx', $user->getName());
    }

    public function testUpdateUser()
    {
        $user = new User();
        $user->setName('test.' . rand(0, 9999));
        $user->setRoleId(1);

        $user->save();
        $this->assertEquals($user->getCreatedAt(), $user->getUpdatedAt());

        sleep(1);

        $user->update();
        $this->assertNotEquals($user->getCreatedAt(), $user->getUpdatedAt());
    }
}