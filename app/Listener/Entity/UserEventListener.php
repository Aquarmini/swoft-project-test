<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Listener\Entity;

use Swoft\Db\Model;
use Swoft\Redis\Redis;
use Swoftx\EntityEvent\Annotation\EventListener;
use Swoftx\EntityEvent\EventInterface;
use App\Models\Entity\User;

/**
 * Class UserEventListener
 * @EventListener(User::class)
 * @package App\Listener\Entity
 */
class UserEventListener implements EventInterface
{
    public function beforeCreate(Model $model): Model
    {
        return $model;
    }

    public function afterCreate(Model $model): Model
    {
        return $model;
    }

    public function beforeUpdate(Model $model): Model
    {
        return $model;
    }

    /**
     * @param User $model
     * @return User
     */
    public function afterUpdate(Model $model): Model
    {
        $redis = bean(Redis::class);
        $redis->set('user_event:user_id:' . $model->getId(), $model->getId());
        return $model;
    }

    public function beforeDelete(Model $model): Model
    {
        return $model;
    }

    public function afterDelete(Model $model): Model
    {
        return $model;
    }
}
