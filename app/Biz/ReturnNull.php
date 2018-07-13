<?php

namespace App\Biz;

class ReturnNull
{
    use AopTrait;

    /**
     * @var string
     */
    protected $str;

    public function callback($str)
    {
        $cls = function () use ($str) {
            return $this->getStr() . $str;
        };

        return $cls();
    }

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