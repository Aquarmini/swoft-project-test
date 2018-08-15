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

use App\Models\Entity\Book;
use App\Models\Entity\EventUser;
use App\Models\Entity\User;
use Swoft\Db\Query;
use Swoft\Db\QueryBuilder;
use Swoft\Redis\Redis;
use Swoft\Test\AbstractTestCase;
use Swoftx\Db\Entity\Manager\ModelCacheManager;

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
        $id = $user->save()->getResult();
        $this->assertTrue($id > 0);

        sleep(1);

        $user = EventUser::findById($id)->getResult();
        $res = $user->update()->getResult();
        $this->assertNotNull($user->getUpdatedAt());
        $this->assertEquals(1, $res);

        $res = $user->delete()->getResult();
        $this->assertEquals(1, $res);
    }

    public function testFindOneByCache()
    {
        $user = User::findOneByCache(1);
        $redis = bean(Redis::class);
        $this->assertEquals(1, $redis->exists(ModelCacheManager::getCacheKey(1, User::class)));
    }

    public function testLeftJoin()
    {
        $result = User::query()->leftJoin(Book::class, 'book.uid = user.id')
            ->where('user.id', 2)
            ->one(['user.*', 'book.name as book_name'])->getResult();

        $this->assertInstanceOf(User::class, $result);
    }

    public function testQueryBuilder()
    {
        $res = Query::table(User::class)->leftJoin(Book::class, 'book.uid = user.id')
            ->where('user.id', 2)
            ->one(['user.*', 'book.name as book_name'])->getResult();

        $this->assertEquals('Agnes', $res['name']);
        $this->assertEquals('时装精选', $res['book_name']);
    }

    public function testCountAndResult()
    {
        $query = Query::table(User::class)->where('id', 1, QueryBuilder::OPERATOR_GT);
        $countQuery = clone $query;

        $count = $query->count()->getResult();
        $res = $countQuery->get()->getResult();

        $this->assertEquals($count, count($res));
    }
}
