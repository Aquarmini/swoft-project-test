<?php

namespace App\Listener\Connection;

use Swoft\App;
use Swoft\Bean\Annotation\Listener;
use Swoft\Event\EventHandlerInterface;
use Swoft\Event\EventInterface;
use Xin\Swoft\Db\Event\Events\DbConnectionEventer;
use Xin\Swoft\Db\Event\MysqlConnectionEvent;

/**
 * Class BeforeSaveListener - event handler
 *
 * @Listener(MysqlConnectionEvent::AFTER_EXECUTE)
 * @package App\Listener\Connection
 */
class AfterExecuteListener implements EventHandlerInterface
{
    /**
     *
     * @author limx
     * @param DbConnectionEventer $event
     */
    public function handle(EventInterface $event)
    {
        $connection = $event->getConnection();
        App::error($connection->getSql());
    }
}