<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use App\Core\Demo;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

// use Swoft\View\Bean\Annotation\View;
// use Swoft\Http\Message\Server\Response;

/**
 * Class AopController
 * @Controller(prefix="/aop")
 * @package App\Controllers
 */
class AopController extends BaseController
{
    /**
     * this is a example action. access uri path: /aop
     * @RequestMapping(route="/aop", method=RequestMethod::GET)
     */
    public function index()
    {
        $demo = bean(Demo::class);
        return $this->response->success($demo->version());
    }
}
