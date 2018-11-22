<?php


namespace App\Core;

use Swoftx\Amqplib\ConfigInterface;
use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;

/**
 * @Bean
 */
class AmqpConfig implements ConfigInterface
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

    /**
     * @return mixed
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return mixed
     */
    public function getPort(): int
    {
        return $this->port;
    }

    /**
     * @return mixed
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @return mixed
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getVhost(): string
    {
        return $this->vhost;
    }
}
