<?php
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://doc.swoft.org
 * @contact  limingxin@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */
namespace App\Jobs;

use App\Models\Entity\User;
use Xin\Swoole\Queue\JobInterface;

class ThrowJob implements JobInterface
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function handle()
    {
        throw new \Exception('抛出错误');
    }
}
