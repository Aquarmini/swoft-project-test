<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases;

use App\Pool\Config\DemoServicePoolConfig;
use Swoft\Rpc\Client\Exception\RpcClientException;
use Swoft\Test\AbstractTestCase;
use Swoft\Test\HttpTestCase;

class RpcTest extends HttpTestCase
{
    public function testRpcVersion()
    {
        $res = $this->request('GET', '/rpc/version');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        // $this->assertEquals('1.0.0', $res['data']);

        $res = $this->request('GET', '/rpc/version2');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        // $this->assertEquals('2.0.0', $res['data']);
    }

    public function testRpcUser()
    {
        $res = $this->request('GET', '/rpc/user/2');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals(0, $res['code']);
        $this->assertEquals(2, $res['data']['id']);
    }

    public function testNotSwoftRequest()
    {
        $config = bean(DemoServicePoolConfig::class);
        $uri = $config->getUri()[0];
        list($host, $port) = explode(':', $uri);
        $client = new \swoole_client(SWOOLE_TCP | SWOOLE_KEEP);
        if (!$client->connect($host, $port, 2)) {
            throw new RpcClientException("connect failed. Error: {$client->errCode}");
        }

        $data = [
            'interface' => 'App\Lib\DemoServiceInterface',
            'version' => '0',
            'method' => 'version',
            'params' => [],
        ];

        $client->send(json_encode($data) . "\r\n");

        $res = $client->recv();
        $res = json_decode($res, true);

        $this->assertEquals(['data' => '1.0.0', 'status' => 200, 'msg' => ''], $res);
    }

    public function testRpcThrowException()
    {
        $res = $this->request('GET', '/rpc/throw-exception');
        $res = json_decode($res->getBody()->getContents(), true);

        $this->assertEquals('1000', $res['code']);
    }
}
