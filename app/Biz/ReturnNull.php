<?php

namespace App\Biz;

class ReturnNull
{
    /**
     * @var string
     */
    protected $str;

    /**
     * @return string
     */
    public function getStr(): string
    {
        return $this->str;
    }

    /**
     * @param string $str
     */
    public function setStr(string $str)
    {
        $this->str = $str;
    }
}