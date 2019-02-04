<?php


namespace Tests\Core;


use App\Core\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @param $method
     * @param $uri
     * @dataProvider requestProvider
     */
    public function testRequestCreation($method, $uri) {
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['REQUEST_URI'] = $uri;

        $request = Request::createFromGlobals();

        $this->assertEquals($request->getMethod(), $method);
        $this->assertEquals($request->getUri(), $uri);
    }

    public function requestProvider()
    {
        return [
            ['GET', 'test.php/'],
            ['POST', 'test.php/'],
            ['PUT', 'test.php/'],
            ['DELETE', 'test.php/'],
        ];
    }
}