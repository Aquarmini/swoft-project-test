<?php
namespace Swoft\Test\Cases\Another;

use App\Biz\ReturnNull;
use Swoft\Test\AbstractTestCase;

class ClassTest extends AbstractTestCase
{
    public function testReturnNull()
    {
        $cls = new ReturnNull();

        try {
            $this->assertTrue($cls->getStr() === null);
        } catch (\Error $ex) {
            $this->assertEquals('Return value of App\Biz\ReturnNull::getStr() must be of the type string, null returned', $ex->getMessage());
        }
    }

    public function testClassClosure()
    {
        $cls = new ReturnNull();
        $cls->setStr('hello ');

        $res = $cls->callback('world');

        $this->assertEquals('hello world', $res);
    }
}