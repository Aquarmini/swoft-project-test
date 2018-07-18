<?php

use Swoftx\Db\Entity\Helper\BeanHelper;

$beanScan = [
    'App\\Breaker',
    'App\\Controllers',
    'App\\Core',
    'App\\Exception',
    'App\\Fallback',
    'App\\Lib',
    'App\\Listener',
    'App\\Middlewares',
    'App\\Models',
    'App\\Pool',
    'App\\Process',
    'App\\Services',
    'App\\Tasks',
    'App\\WebSocket',
];

$customBean = [
    'App\\Biz',
    'App\\Config',
    'App\\Jobs',
    'Swoftx\\Db\\Entity\\',
];

$beanScan = array_merge($beanScan, $customBean);
return $beanScan;