<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases\Another;

use Swoft\Test\AbstractTestCase;

class ArrayTest extends AbstractTestCase
{
    public function testExample()
    {
        $array = [];
        $array['t1'] = $array['t1'] ?? 0;
        $array['t2'] = $array['t2'] ?? '';

        $this->assertEquals(['t1' => 0, 't2' => ''], $array);

        $array = ['t1' => '', 't2' => ''];
        $array['t1'] = is_numeric($array['t1']) ?: 0;
        $array['t2'] = is_numeric($array['t2']) ?: 2;

        $this->assertEquals(['t1' => 0, 't2' => 2], $array);
    }
}
