<?php


namespace Tests\Core;


use App\Core\Http\Method;
use App\Core\Http\Route;
use PHPUnit\Framework\TestCase;
use Tests\Mock\EmptyControllerFunction;

class RouteTest extends TestCase
{

    /**
     * @param $path
     * @param $expectedRegex
     * @dataProvider routeRegexProvider
     */
    public function testRouteRegex($path, $expectedRegex)
    {
        $route = new Route(Method::GET, $path, new EmptyControllerFunction());

        $this->assertEquals($expectedRegex, $route->getRegex());
    }

    public function routeRegexProvider(): array
    {
        return [
            ['/', '/^\/*$/'],
            ['/test', '/^\/test\/*$/'],
            ['/hello/world', '/^\/hello\/world\/*$/'],
            ['/{foo}', '/^\/(\w+)\/*$/'],
            ['/user/{id}', '/^\/user\/(\w+)\/*$/'],
            ['/{post}', '/^\/(\w+)\/*$/'],
            ['/post/{post_id}/comment/{comment_id}', '/^\/post\/(\w+)\/comment\/(\w+)\/*$/']
        ];
    }

    /**
     * @param $path
     * @param $expectedParameters
     * @dataProvider routeParametersProvider
     */
    public function testRouteParameters($path, $expectedParameters)
    {
        $route = new Route(Method::GET, $path, new EmptyControllerFunction());

        $this->assertEquals($expectedParameters, $route->getParameters());
    }

    public function routeParametersProvider(): array
    {
        return [
            ['/', []],
            ['/test', []],
            ['/hello/world', []],
            ['/user/{id}', ['id']],
            ['/{post}', ['post']],
            ['/post/{post_id}/comment/{comment_id}', ['post_id', 'comment_id']]
        ];
    }
}