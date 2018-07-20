<?php

namespace App\Biz\Test;

class Base
{
    private $version = '1.0.0';

    public function getVersion()
    {
        return $this->version;
    }
}