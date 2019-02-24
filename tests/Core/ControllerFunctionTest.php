<?php

namespace Tests\Core;

use App\Core\Http\ControllerFunction;
use App\Core\Http\Request;
use App\Core\Http\Response\Response;
use PHPUnit\Framework\TestCase;
use Tests\Mock\MockApplication;
use Tests\Mock\MockController;

class ControllerFunctionTest extends TestCase
{
    /**
     * @param $className
     * @param $functionName
     * @param $expectedClass
     * @dataProvider getClassDataProvider
     */
    public function testGetClass($className, $functionName, $expectedClass)
    {
        $app = new MockApplication();
        $app->boot();

        $controllerFunction = new ControllerFunction($className, $functionName);
        $this->assertEquals($expectedClass, $controllerFunction->getClass($app));
    }

    public function getClassDataProvider()
    {
       return [
           [MockController::class, 'action', MockController::class],
           ['MockController@action', null, MockController::class],
       ];
    }

    /**
     * @throws \ReflectionException
     */
    public function testNull()
    {
        $app = new MockApplication();
        $app->boot();

        $controllerFunction = new ControllerFunction(null, null);

        $this->assertNull($controllerFunction->getClass($app));
        $this->assertNull($controllerFunction->invoke($app, new MockController(), new Request('', '', '', '')));
    }

    public function testClassDoesntExists()
    {
        $app = new MockApplication();
        $app->boot();

        $controllerFunction = new ControllerFunction('FakeController@action', null);

        $this->assertNull($controllerFunction->getClass($app));
    }

    /**
     * @throws \ReflectionException
     */
    public function testFunctionDoesntExists()
    {
        $app = new MockApplication();
        $app->boot();

        $controllerFunction = new ControllerFunction('MockController@test', null);

        $this->assertEquals(MockController::class, $controllerFunction->getClass($app));
        $this->assertNull($controllerFunction->invoke($app, new MockController(), new Request('', '', '', '')));
    }

    /**
     * @throws \ReflectionException
     */
    public function testInvoke()
    {
        $app = new MockApplication();
        $app->boot();

        $controllerFunction = new ControllerFunction('MockController@action', null);
        $this->assertEquals(
            new Response(200, Response::PLAIN_CONTENT_TYPE, 'success'),
            $controllerFunction->invoke($app, new MockController(), new Request('', '', '', ''))
        );
    }
}
