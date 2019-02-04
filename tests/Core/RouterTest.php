<?php


namespace Tests\Core;


use App\Core\Method;
use App\Core\Route;
use App\Core\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    /**
     * @param $routes
     * @dataProvider routerProvider
     */
    public function testRouter($routes)
    {
        $router = new Router();

        /* @var $route Route */
        foreach ($routes as $route) {
            switch ($route->getMethod()) {
                case Method::GET:
                    $router->get($route->getPath(), $route->getControllerClass(), $route->getControllerFunction());
                    break;
                case Method::POST:
                    $router->post($route->getPath(), $route->getControllerClass(), $route->getControllerFunction());
                    break;
                case Method::PUT:
                    $router->put($route->getPath(), $route->getControllerClass(), $route->getControllerFunction());
                    break;
                case Method::DELETE:
                    $router->delete($route->getPath(), $route->getControllerClass(), $route->getControllerFunction());
                    break;
            }
        }

        $this->assertEquals($routes, $router->getRegisteredRoutes());
    }

    public function routerProvider(): array {
        return [
            [
                [
                    new Route(Method::GET, '/', RouterTest::class, 'testRouter')
                ]
            ],
            [
                [
                    new Route(Method::GET, '/', RouterTest::class, 'testRouter'),
                    new Route(Method::POST, '/test', RouterTest::class, 'testRouter')
                ]
            ],
            [
                [
                    new Route(Method::GET, '/', RouterTest::class, 'testRouter'),
                    new Route(Method::POST, '/test', RouterTest::class, 'testRouter'),
                    new Route(Method::PUT, '/hello', RouterTest::class, 'testRouter')
                ]
            ],
            [
                [
                    new Route(Method::GET, '/', RouterTest::class, 'testRouter'),
                    new Route(Method::POST, '/test', RouterTest::class, 'testRouter'),
                    new Route(Method::DELETE, '/foobar', RouterTest::class, 'testRouter'),
                    new Route(Method::PUT, '/hello', RouterTest::class, 'testRouter')
                ]
            ]
        ];
    }
}