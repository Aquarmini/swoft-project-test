<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Jobs;

use App\Models\Entity\User;
use Xin\Swoole\Queue\JobInterface;

class TestJob implements JobInterface
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        /** @var User $user */
        $user = User::findById($this->id)->getResult();
        return $user->delete();
    }
}
