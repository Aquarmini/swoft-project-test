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
        $file = alias('@runtime/' . $this->id);
        return file_put_contents($file, $this->id);
    }
}
