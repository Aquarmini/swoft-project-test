<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoft\Test;

use PHPUnit\Framework\TestCase;
use Swoft\Helper\JsonHelper;
use Swoft\HttpClient\Client;

/**
 * Class GuzzleTestCase
 *
 * @package Swoft\Test\Cases
 */
class HttpTestCase extends TestCase
{
    protected $client;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $port = env('HTTP_PORT', 8080);
        $this->client = new Client([
            'base_uri' => sprintf('http://127.0.0.1:%s', $port),
            'adapter' => 'curl',
        ]);
    }

    public function post($uri, $data = [])
    {
        $res = $this->client->post($uri, [
            'body' => http_build_query($data)
        ])->getResult();

        return JsonHelper::decode($res, true);
    }

    public function get($uri, $data = [])
    {
        $res = $this->client->get($uri)->getResult();
        return JsonHelper::decode($res, true);
    }
}
