<?php

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