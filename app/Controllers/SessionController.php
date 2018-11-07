<?php
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\Redis\Redis;

/**
 * Class SessionController
 * @Controller(prefix="/session")
 * @package App\Controllers
 */
class SessionController extends BaseController
{
    /**
     * @RequestMapping(route="index", method=RequestMethod::GET)
     */
    public function index()
    {
        $sid1 = session()->getId();
        $redis = bean(Redis::class);
        // $redis->get('111');
        \co::sleep(1);
        $sid2 = session()->getId();

        return $this->response->success([
            $sid1, $sid2
        ]);
    }
}
