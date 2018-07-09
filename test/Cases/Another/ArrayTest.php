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
        $array['t1'] = is_numeric($array['t1']) ? $array['t1'] : 0;
        $array['t2'] = is_numeric($array['t2']) ? $array['t2'] : 2;

        $this->assertTrue($array['t1'] === 0);
        $this->assertTrue($array['t2'] === 2);

        $array = ['t1' => '', 't2' => 3];
        $array['t1'] = is_numeric($array['t1']) ? $array['t1'] : 0;
        $array['t2'] = is_numeric($array['t2']) ? $array['t2'] : 2;

        $this->assertTrue($array['t1'] === 0);
        $this->assertTrue($array['t2'] === 3);
    }

    public function testArrayCountValues()
    {
        $arr = [1, 3, 3, '3', '4', 'a', 'b', 'a'];
        $res = array_count_values($arr);
        $this->assertEquals([
            1 => 1,
            3 => 3,
            4 => 1,
            'a' => 2,
            'b' => 1
        ], $res);

        $arr2 = [1, '4', 'a', 'b'];
        $res2 = array_count_values($arr2);
        $this->assertEquals([
            1 => 1,
            4 => 1,
            'a' => 1,
            'b' => 1
        ], $res2);

        $res = array_intersect_key($res, $res2);
        $this->assertEquals([
            1 => 1,
            4 => 1,
            'a' => 2,
            'b' => 1
        ], $res);
    }
}
