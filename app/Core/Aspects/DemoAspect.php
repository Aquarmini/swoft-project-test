<?php
namespace App\Core\Aspects;

use Swoft\Aop\JoinPoint;
use Swoft\Aop\ProceedingJoinPoint;
use Swoft\Bean\Annotation\PointAnnotation;
use Swoft\Bean\Annotation\Cacheable;
use SwoftTest\Aop\RegBean;
use Swoft\Bean\Annotation\Before;
use Swoft\Bean\Annotation\After;
use Swoft\Bean\Annotation\AfterReturning;
use Swoft\Bean\Annotation\Around;
use Swoft\Bean\Annotation\AfterThrowing;
use Swoft\Bean\Annotation\Aspect;
use Swoft\Bean\Annotation\PointBean;
use App\Core\Demo;

/**
 * Class DemoAspect
 * @Aspect
 * @PointBean(
 *     include={Demo::class}
 * )
 * @PointAnnotation(
 *     include={
 *         Cacheable::class
 *     }
 * )
 * @package App\Core\Aspects
 */
class DemoAspect
{
    /**
     * @Before()
     */
    public function before()
    {
        var_dump(' before1 ');
    }

    /**
     * @After()
     */
    public function after()
    {
        var_dump(' after1 ');
    }

    /**
     * @AfterReturning()
     */
    public function afterReturn(JoinPoint $joinPoint)
    {
        $result = $joinPoint->getReturn();
        var_dump($result);
        return $result . '@beta';
    }

    /**
     * @Around()
     * @param ProceedingJoinPoint $proceedingJoinPoint
     * @return mixed
     */
    public function around(ProceedingJoinPoint $proceedingJoinPoint)
    {
        var_dump(' around-before1 ');
        $target = $proceedingJoinPoint->getTarget();
        var_dump($target);
        $target->version = '2.0.0';
        $result = $proceedingJoinPoint->proceed();
        var_dump(' around-after1 ');
        return $result;
    }

    /**
     * @AfterThrowing()
     */
    public function afterThrowing()
    {
        echo "aop=1 afterThrowing !\n";
    }
}