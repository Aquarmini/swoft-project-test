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

use App\Core\Elastic\Client;
use Swoft\Helper\JsonHelper;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

// use Swoft\View\Bean\Annotation\View;
// use Swoft\Http\Message\Server\Response;

/**
 * Class ElasticController
 * @Controller(prefix="/elastic")
 * @package App\Controllers
 */
class ElasticController extends BaseController
{
    /**
     * @RequestMapping(route="info", method=RequestMethod::GET)
     */
    public function info()
    {
        // $client = bean(Client::class)->getClient();
        // $info = $client->info();

        $client = new \Swoft\HttpClient\Client([
            'base_uri' => 'http://127.0.0.1:9200/',
        ]);
        $string = $client->get('/')->getResult();

        $info = JsonHelper::decode($string, true);
        return $this->response->success($info);
    }

    /**
     * @RequestMapping(route="index", method=RequestMethod::GET)
     */
    public function index()
    {
        // $client = bean(Client::class)->getClient();
        // $info = $client->indices()->get([
        //     'index' => 'es:index'
        // ]);

        $client = new \Swoft\HttpClient\Client([
            'base_uri' => 'http://127.0.0.1:9200/',
        ]);
        $string = $client->get('/es:index')->getResult();

        $info = JsonHelper::decode($string, true);

        return $this->response->success($info);
    }
}
