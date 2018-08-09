<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace Swoft\Test\Cases;

use App\Models\Entity\EventUser;
use App\Models\Entity\User;
use Swoft\Db\Pool\DbPool;
use Swoft\Db\Pool\DbSlavePool;
use Swoft\Log\Logger;
use Swoft\Test\AbstractTestCase;

class LoggerTest extends AbstractTestCase
{
    public function testCustomLogger()
    {
        $file = alias('@runtime/logs/test.log');
        $text = file_get_contents($file);
        $count = count(explode("\n", $text));

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
