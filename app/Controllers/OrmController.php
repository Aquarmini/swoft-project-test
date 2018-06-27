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
class OrmController
{
    /**
     * @RequestMapping(route="users", method=RequestMethod::GET)
     */
    public function users(Response $response): Response
    {
        $users = User::findAll();
        $results = $users->getResult();

        return $response->json($results);
    }
}
