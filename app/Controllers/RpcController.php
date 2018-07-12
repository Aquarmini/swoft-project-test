<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use App\Lib\Demo2ServiceInterface;
use App\Lib\DemoServiceInterface;
use App\Models\Dao\UserDao;
use Swoft\Bean\Annotation\Inject;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\Rpc\Client\Bean\Annotation\Reference;

// use Swoft\View\Bean\Annotation\View;
// use Swoft\Http\Message\Server\Response;

/**
 * Class RpcController
 * @Controller(prefix="/rpc")
 * @package App\Controllers
 */
class RpcController extends BaseController
{
    /**
     * @Reference(name="demo", fallback="demoFallback")
     * @var DemoServiceInterface
     */
    private $demoService;

    /**
     * @Reference(name="demo", fallback="demo2Fallback")
     * @var Demo2ServiceInterface
     */
    private $demo2Service;

    /**
     * @Inject()
     * @var UserDao
     */
    private $userDao;

    /**
     * this is a example action. access uri path: /rpc
     * @RequestMapping(route="version", method=RequestMethod::GET)
     * @return array
     */
    public function version()
    {
        $version = $this->demoService->version();
        return $this->response->success($version);
    }

    /**
     * this is a example action. access uri path: /rpc
     * @RequestMapping(route="version2", method=RequestMethod::GET)
     * @return array
     */
    public function version2()
    {
        $version = $this->demo2Service->version();
        return $this->response->success($version);
    }

    /**
     * @RequestMapping(route="user/{id}", method=RequestMethod::GET)
     * @author limx
     */
    public function user($id)
    {
        $user = $this->userDao->findById($id);
        return $this->response->success($user);
    }
}
