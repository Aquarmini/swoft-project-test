<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
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
