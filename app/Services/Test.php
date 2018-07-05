<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
// | Test.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

namespace App\Services;

class Test
{
    public static $instance;

    public $index;

    public static function instance()
    {
        if (static::$instance instanceof static) {
            return static::$instance;
        }
        return static::$instance = new static();
    }

    public function incr()
    {
        return $this->index++;
    }

    public function get()
    {
        return $this->index;
    }
}
