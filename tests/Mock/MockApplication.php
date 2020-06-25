<?php


namespace Tests\Mock;


use Core\AbstractApplication;
use Core\Http\Router;

class MockApplication extends AbstractApplication
{
    const CONTROLLER_PATH = 'Tests\Mock';

    /**
     *
     */
    public function boot(): void
    {
        $this->setControllerNamespace(self::CONTROLLER_PATH);
    }

    /**
     * @param Router $router
     */
    public function registerRoutes(Router $router): void
    {
    }
}