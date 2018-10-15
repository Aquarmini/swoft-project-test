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

use App\Biz\Test\DemoClient;
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
     * @Reference(name="demo")
     * @var Demo2ServiceInterface
     */
    private $demo2Service;

    /**
     * @Inject()
     * @var UserDao
     */
    private $userDao;

    /**
     * @RequestMapping(route="version", method=RequestMethod::GET)
     * @return array
     */
    public function version()
    {
        $version = $this->demoService->version();
        return $this->response->success($version);
    }

    /**
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

    /**
     * @RequestMapping(route="big-message", method=RequestMethod::GET)
     * @author limx
     */
    public function bigMessage()
    {
        $input = '';
        for ($i = 0; $i < 5; $i++) {
            $input .= 'Hi,Agnes! ';
        }
        $data = $this->demoService->bigMessage($input);
        return $this->response->success($data);
    }

    /**
     * @RequestMapping(route="bean-rpc", method=RequestMethod::GET)
     * @return \Swoft\Http\Message\Server\Response
     */
    public function beanRpc()
    {
        $bean = bean(DemoClient::class);
        return $this->response->success($bean->version());
    }

    /**
     * @RequestMapping(route="get/{id}", method=RequestMethod::GET)
     * @author limx
     */
    public function get($id)
    {
        return $this->response->success($this->demoService->get($id));
    }

    /**
     * @RequestMapping(route="throw-exception", method=RequestMethod::GET)
     * @author limx
     */
    public function throwException()
    {
        $res = $this->demo2Service->throwException();

        return $this->response->success($res);
    }
}
