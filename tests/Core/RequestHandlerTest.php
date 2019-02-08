<?php


namespace Tests\Core;


use App\Core\Method;
use App\Core\NotFoundException;
use App\Core\Request;
use App\Core\RequestHandler;
use PHPUnit\Framework\TestCase;

class RequestHandlerTest extends TestCase
{
    /**
     * @param $route
     * @param $uri
     * @param $expectedParameters
     * @dataProvider requestParametersProvider
     * @throws \App\Core\NotFoundException
     */
    public function testRequestParameters($route, $uri, $expectedParameters)
    {
        $_SERVER['REQUEST_METHOD'] = Method::GET;
        $_SERVER['REQUEST_URI'] = $uri;

        $requestHandler = new RequestHandler();
        $requestHandler->getRouter()->get($route, '','');

        $request = Request::createFromGlobals();
        $requestHandler->handleRequest($request);

        $this->assertEquals($expectedParameters, $request->getParameters());
    }

    public function requestParametersProvider()
    {
        return [
            ['/', '/', []],
            ['/{foo}', '/hello_world', ['foo' => 'hello_world']],
            ['/value/{value}', '/value/hello', ['value' => 'hello']],
            ['/user/{id}', '/user/12345', ['id' => '12345']],
            ['/post/{post_id}/comment/{comment_id}', '/post/6394/comment/4087', ['post_id' => '6394', 'comment_id' => '4087']]
        ];
    }

    /**
     * @throws \App\Core\NotFoundException
     */
    public function testNotFoundException()
    {
        $this->expectException(NotFoundException::class);

        $_SERVER['REQUEST_METHOD'] = Method::GET;
        $_SERVER['REQUEST_URI'] = '/test';

        $requestHandler = new RequestHandler();

        $request = Request::createFromGlobals();
        $requestHandler->handleRequest($request);

    }
}