<?php
/**
 * This file is part of Swoft.
 *
 * @link    https://swoft.org
 * @document https://doc.swoft.org
 * @contact group@swoft.org
 * @license https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Controllers;

use App\Models\Entity\User;
use Swoft\Core\RequestContext;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

// use Swoft\View\Bean\Annotation\View;
use Swoft\Http\Message\Server\Response;

/**
 * Class OrmController
 * @Controller(prefix="/orm")
 * @package App\Controllers
 */
class OrmController extends BaseController
{
    /**
     * @RequestMapping(route="users", method=RequestMethod::GET)
     */
    public function users(Response $response): Response
    {
        $users = User::findAll();
        \co::sleep(1);
        $results = $users->getResult();

        return $this->response->success($results);
    }

    /**
     * @RequestMapping(route="user/{id}", method=RequestMethod::POST)
     */
    public function save(int $id, Response $response): Response
    {
        /** @var User $user */
        $user = User::findById($id)->getResult();
        if (empty($user)) {
            return $response->json([
                'code' => 1001,
                'message' => 'User Not Find'
            ]);
        }

        $res = $user->update()->getResult();
        return $this->response->success($res);
    }
}
