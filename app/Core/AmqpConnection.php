<?php


namespace App\Core;

use Swoftx\Amqplib\Connection;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Inject;

/**
 * @Bean
 */
class AmqpConnection extends Connection
{
    /**
     * @Inject
     * @var AmqpConfig
     */
    protected $config;
}