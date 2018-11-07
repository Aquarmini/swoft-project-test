<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoft\Test\Cases\Another;

use App\Models\Validator\TestValidator;
use Swoft\Test\AbstractTestCase;

class ThinkValidatorTest extends AbstractTestCase
{
    public function testThinkValidate()
    {
        $validator = new TestValidator();
        $res = $validator->check([]);
        $this->assertFalse($res);
        $this->assertEquals('id 必传', $validator->getError());

        $validator = new TestValidator();
        $res = $validator->check(['id' => 1]);
        $this->assertTrue($res);

        $validator = new TestValidator();
        $res = $validator->check(['id' => 1, 'name' => 'Agnes']);
        $this->assertFalse($res);
        $this->assertEquals('名称错误', $validator->getError());

        $validator = new TestValidator();
        $res = $validator->check(['id' => 1, 'name' => 'limx']);
        $this->assertTrue($res);

        $validator = new TestValidator();
        $res = $validator->check(['id' => 1, 'name' => 'limx', 'email' => 'sss']);
        $this->assertFalse($res);
        $this->assertEquals('email格式不符', $validator->getError());
    }
}
