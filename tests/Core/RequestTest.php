<?php


namespace Tests\Core;


use App\Core\Request;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    /**
     * @param $method
     * @param $expectedRequestClass
     * @dataProvider requestProvider
     */
    public function testRequestCreation($method, $expectedRequestClass) {
        $_SERVER['REQUEST_METHOD'] = $method;
        $_SERVER['REQUEST_URI'] = 'test.php/';

        $request = Request::createFromGlobals();

        $this->assertInstanceOf($expectedRequestClass, $request);
        $this->assertEquals($request->getMethod(), $method);
        $this->assertEquals($request->getUri(), 'test.php/');
    }

    public function requestProvider()
    {
        return [
            ['GET', Request\GetRequest::class],
            ['POST', Request\PostRequest::class],
        ];
    }
}