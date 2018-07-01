<?php

namespace App\Lib;

use Swoft\Core\ResultInterface;

/**
 * Interface DemoServiceInterface
 * @package App\Lib
 * @method ResultInterface deferVersion()
 */
interface DemoServiceInterface
{
    public function version();
}