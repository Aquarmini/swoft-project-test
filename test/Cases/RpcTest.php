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
use Swoft\Test\HttpTestCase;

class RpcTest extends HttpTestCase
{
    public function testRpcVersion()
    {
        $res = $this->get('/rpc/version');
        $this->assertEquals(0, $res['code']);
        // $this->assertEquals('1.0.0', $res['data']);

        $res = $this->get('/rpc/version2');
        $this->assertEquals(0, $res['code']);
        // $this->assertEquals('2.0.0', $res['data']);
    }

    public function testRpcUser()
    {
        $res = $this->get('/rpc/user/2');

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
        $res = $this->get('/rpc/throw-exception');

        $this->assertEquals('1000', $res['code']);
    }
}
