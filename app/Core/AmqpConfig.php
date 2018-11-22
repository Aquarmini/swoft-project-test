<?php


namespace App\Core;

use Swoftx\Amqplib\Config;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;

/**
 * @Bean
 */
class AmqpConfig extends Config
{
    /**
     * @Value(env="${AMQP_HOST}")
     */
    protected $host;

    /**
     * @Value(env="${AMQP_PORT}")
     */
    protected $port;

    /**
     * @Value(env="${AMQP_USER}")
     */
    protected $user;

    /**
     * @Value(env="${AMQP_PASSWORD}")
     */
    protected $password;

    /**
     * @Value(env="${AMQP_VHOST}")
     */
    protected $vhost;

    public function __construct($host = '127.0.0.1', $port = 5672, $user = 'guest', $password = 'guest', $vhost = '/')
    {
    }
}