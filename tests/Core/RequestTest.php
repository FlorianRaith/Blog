<?php


namespace Tests\Core;


use App\Core\Method;
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
        $_SERVER['HTTP_HOST'] = 'localhost';

        $request = Request::createFromGlobals();

        $this->assertEquals($request->getMethod(), $method);
        $this->assertEquals($request->getUri(), $uri);
    }

    public function requestProvider()
    {
        return [
            [Method::GET, 'test.php/'],
            [Method::POST, 'test.php/'],
            [Method::PUT, 'test.php/'],
            [Method::DELETE, 'test.php/'],
        ];
    }
}