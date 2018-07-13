<?php
namespace App\Biz;

trait AopTrait
{
    /**
     * AOP proxy call method
     *
     * @param \Closure $closure
     * @param string   $method
     * @param array    $params
     * @return mixed|null
     * @throws \Throwable
     */
    public function __proxyCall(\Closure $closure, string $method, array $params)
    {
        if ($method === 'getStr') {
            if (!is_string($this->str)) {
                $this->str = '';
            }
        }
        return $closure(...$params);
    }
}