<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Core\Elastic;

use Elasticsearch\ClientBuilder;
use Swoft\Bean\Annotation\Bean;

/**
 * Class Client
 * @Bean
 * @package App\Core\Elastic
 */
class Client
{
    protected $client;

    public function getClient()
    {
        if ($this->client instanceof \Elasticsearch\Client) {
            return $this->client;
        }

        return $this->client = ClientBuilder::create()->setHosts(['127.0.0.1:9200'])->build();
    }
}
