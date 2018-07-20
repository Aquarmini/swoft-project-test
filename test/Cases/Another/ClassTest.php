<?php

namespace Swoft\Test\Cases\Another;

use App\Biz\ProxyVisitor;
use App\Biz\ReturnNull;
use App\Biz\Test\Version;
use PhpParser\NodeTraverser;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;
use Swoft\Test\AbstractTestCase;

class ClassTest extends AbstractTestCase
{
    public function testReturnNull()
    {
        $cls = new ReturnNull();

        try {
            $this->assertTrue($cls->getStr() === null);
        } catch (\Error $ex) {
            $this->assertEquals('Return value of App\Biz\ReturnNull::getStr() must be of the type string, null returned', $ex->getMessage());
        }
    }

    public function testClassClosure()
    {
        $cls = new ReturnNull();
        $cls->setStr('hello ');

        $res = $cls->callback('world');

        $this->assertEquals('hello world', $res);
    }

    public function testClassParser()
    {
        $file = alias('@app/Biz/ReturnNull.php');
        $code = file_get_contents($file);
        $parser = (new ParserFactory())->create(ParserFactory::PREFER_PHP7);
        $ast = $parser->parse($code);

        $traverser = new NodeTraverser();
        $className = 'App\\Biz\\ReturnNull';
        $proxyId = uniqid();
        $visitor = new ProxyVisitor($className, $proxyId);
        $traverser->addVisitor($visitor);
        $proxyAst = $traverser->traverse($ast);
        if (!$proxyAst) {
            throw new \RuntimeException(sprintf('Class %s AST optimize failure', $className));
        }
        $printer = new Standard();
        $proxyCode = $printer->prettyPrint($proxyAst);

        eval($proxyCode);

        $class = $visitor->getClassName();
        $cls = new $class();

        $this->assertEquals('', $cls->getStr());
    }

    public function testPrivateExtends()
    {
        $v = new Version();

        $this->assertEquals('1.0.0', $v->getVersion());
    }
}