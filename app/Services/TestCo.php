<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
// | Test.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------

namespace App\Services;

use Swoft\Core\RequestContext;

class TestCo
{
    public static $instance;

    public $index;

    public static function instance()
    {
        $instance = RequestContext::getContextDataByKey(static::class);
        if (empty($instance) || !$instance instanceof static) {
            $instance = new static();
            RequestContext::setContextDataByKey(static::class, $instance);
        }

        return $instance;
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
