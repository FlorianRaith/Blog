<?php


namespace Tests\Core;


use App\Core\Method;
use App\Core\NotFoundException;
use App\Core\Request;
use App\Core\Kernel;
use PHPUnit\Framework\TestCase;
use Tests\Mock\MockController;

class KernelTest extends TestCase
{
    /**
     * @param $route
     * @param $uri
     * @param $expectedParameters
     * @dataProvider requestParametersProvider
     * @runInSeparateProcess
     * @throws \App\Core\NotFoundException
     * @throws \ReflectionException
     */
    public function testRequestParameters($route, $uri, $expectedParameters)
    {
        $_SERVER['REQUEST_METHOD'] = Method::GET;
        $_SERVER['REQUEST_URI'] = $uri;
        $_SERVER['HTTP_HOST'] = 'localhost';

        $kernel = new Kernel();
        $kernel->getRouter()->get($route, MockController::class,'action');

        $request = Request::createFromGlobals();
        $kernel->handleRequest($request);

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
     * @throws \ReflectionException
     */
    public function testNotFoundException()
    {
        $this->expectException(NotFoundException::class);

        $_SERVER['REQUEST_METHOD'] = Method::GET;
        $_SERVER['REQUEST_URI'] = '/test';
        $_SERVER['HTTP_HOST'] = 'localhost';

        $requestHandler = new Kernel();

        $request = Request::createFromGlobals();
        $requestHandler->handleRequest($request);

    }

    /**
     * @runInSeparateProcess
     */
    public function testHandleException()
    {
        $exception = new NotFoundException('Resource Not Found');

        $requestHandler = new Kernel();
        $response = $requestHandler->handleException($exception);

        $this->assertEquals(404, $response->getStatusCode());
        $this->assertEquals('Content-type: text/plain; charset=UTF-8', $response->getContentType());
        $this->assertEquals('Resource Not Found', $response->getContent());
    }
}