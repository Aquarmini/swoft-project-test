<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Models\Dao;

use App\Models\Entity\User;
use Swoft\Bean\Annotation\Bean;

/**
 * @Bean()
 * Class UserDao
 * @package App\Models\Dao
 */
class UserDao
{
    /**
     * 根据用户ID返回用户实体
     * @author limx
     * @param $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return User::findById($id)->getResult();
    }
}
