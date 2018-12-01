<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace Swoft\Test\Cases\Another;

use App\Models\Service\AmqpDemoPublisher;
use Swoft\Test\HttpTestCase;

class AmqpTest extends HttpTestCase
{
    public function testAmqpPublish()
    {
        $id = uniqid();
        AmqpDemoPublisher::make()->setData(['id' => $id])->publish();
        sleep(1);
        $file = alias('@runtime/' . $id);
        $this->assertEquals(file_get_contents($file), $id);

        $id = uniqid();
        $res = $this->get('/co/amqp/' . $id);
        $this->assertEquals(0, $res['code']);

        sleep(1);
        $file = alias('@runtime/' . $id);
        $this->assertEquals(file_get_contents($file), $id);
    }
}
