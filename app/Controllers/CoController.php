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

use App\Services\Test;
use App\Services\TestCo;
use Swoft\Core\RequestContext;
use Swoft\Http\Server\Bean\Annotation\Controller;
use Swoft\Http\Server\Bean\Annotation\RequestMapping;
use Swoft\Http\Server\Bean\Annotation\RequestMethod;

// use Swoft\View\Bean\Annotation\View;
// use Swoft\Http\Message\Server\Response;

/**
 * Class CoController
 * @Controller(prefix="/co")
 * @package App\Controllers
 */
class CoController
{
    /**
     * this is a example action. access uri path: /co
     * @RequestMapping(route="index", method=RequestMethod::GET)
     * @return array
     */
    public function index(): array
    {
        Test::instance()->incr();
        \co::sleep(1);
        return [Test::instance()->get()];
    }

    /**
     * @author limx
     * @RequestMapping(route="index2", method=RequestMethod::GET)
     */
    public function index2(): array
    {
        TestCo::instance()->incr();
        TestCo::instance()->incr();
        TestCo::instance()->incr();
        \co::sleep(1);
        return [TestCo::instance()->get()];
    }
}
