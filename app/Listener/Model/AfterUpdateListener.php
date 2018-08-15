<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Listener\Model;

use Swoft\Bean\Annotation\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Xin\Swoft\Db\Event\ModelEvent;

/**
 * Class BeforeUpdateListener - event handler
 *
 * @Listener(ModelEvent::AFTER_UPDATE)
 * @package App\Listener\Model
 */
class AfterUpdateListener implements EventHandlerInterface
{
    /**
     * @param EventInterface $event
     */
    public function handle(EventInterface $event)
    {
        /** @var Model $model */
        $model = $event->getModel();
    }
}
