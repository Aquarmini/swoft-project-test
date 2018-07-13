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

use Swoft\Http\Message\Server\Request;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;
use Swoft\Bean\Annotation\Number;
use Swoft\Bean\Annotation\Strings;

// use Swoft\View\Bean\Annotation\View;
// use Swoft\Http\Message\Server\Response;

/**
 * Class TestController
 * @Controller(prefix="/test")
 * @package App\Controllers
 */
class TestController extends BaseController
{
    /**
     * @RequestMapping(route="json/bigint", method=RequestMethod::GET)
     */
    public function index()
    {
        $json = '{"bigint":1111111111111111111111}';
        $data = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
        $data['str'] = '中文';

        return $this->response->success($data);
    }

    /**
     * @Number(name="test.id", max=10)
     * @Strings(name="test.name", default="limx")
     * @RequestMapping(route="json", method=RequestMethod::POST)
     */
    public function json(Request $request)
    {
        $id = $request->json('test.id');
        $name = $request->json('test.name');

        return $this->response->success([$id, $name]);
    }
}
