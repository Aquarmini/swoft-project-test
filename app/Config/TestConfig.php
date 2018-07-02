<?php

namespace App\Config;

use Swoft\Bean\Annotation\Bean;
use Swoft\Bean\Annotation\Value;

/**
 * Class TestConfig
 * @Bean()
 * @package App\Config
 */
class TestConfig
{
    /**
     * @Value(env="${DB_NAME}")
     * @var string
     */
    public $version = 'error version';

    public function getVersion()
    {
        return $this->version;
    }
}