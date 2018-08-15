<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases;

use Swoft\Log\Logger;
use Swoft\Test\AbstractTestCase;

class LoggerTest extends AbstractTestCase
{
    public function testCustomLogger()
    {
        $file = alias('@runtime/logs/test.log');
        $count = 1;
        if (file_exists($file)) {
            $text = file_get_contents($file);
            $count = count(explode("\n", $text));
        }

        /** @var Logger $logger */
        $logger = bean('testLogger');
        $logger->error('xxx');
        $logger->info('xxx');
        $logger->debug('xxx');

        $text = file_get_contents($file);
        $count2 = count(explode("\n", $text));

        $this->assertTrue($count2 - $count === 3);
    }
}
