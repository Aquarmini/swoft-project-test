<?php
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Commands;

use App\Config\TestConfig;
use App\Pool\Config\DemoServicePoolConfig;
use Swoft\Console\Bean\Annotation\Command;
use Swoft\Console\Input\Input;
use Swoft\Console\Output\Output;

/**
 * This is a example command class
 * @Command(coroutine=false)
 * @package App\Commands
 */
class TestCommand
{
    /**
     * this is a example command
     * @Usage {command} [arguments ...] [--options ...]
     * @Arguments
     *   first STRING        The first argument value
     *   second STRING       The second argument value
     * @Options
     *   --opt STRING        This is a long option
     *   -s BOOL             This is a short option(<comment>use color</comment>)
     * @Example {command} FIRST SECOND --opt VALUE -s
     * @param Input  $input
     * @param Output $output
     * @return int
     */
    public function demo(Input $input, Output $output): int
    {
        /** @var TestConfig $config */
        $config = bean(TestConfig::class);
        $output->writeln('hello, this is ' . $config->getVersion());

        /** @var DemoServicePoolConfig $config */
        $config = bean(DemoServicePoolConfig::class);
        $output->writeln('hello, this is ' . $config->getName());

        return 0;
    }
}
