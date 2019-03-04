<?php


namespace App\Core;


use App\Core\Http\Router;

/**
 * Class AbstractApplication
 * @package App\Core
 */
abstract class AbstractApplication
{
    /**
     * @var array
     */
    private $services = [];

    /**
     * @var string
     */
    private $controllerNamespace;

    /**
     * @var string
     */
    private $viewsPath;

    /**
     *
     */
    abstract public function boot(): void;

    /**
     * @param Router $router
     */
    abstract public function registerRoutes(Router $router): void;

    /**
     * @param string $name
     * @param $service
     */
    protected function registerService(string $name, $service)
    {
        $this->services[$name] = $service;
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getService(string $name)
    {
        return $this->services[$name];
    }

    /**
     * @param string $controllerNamespace
     */
    protected function setControllerNamespace(string $controllerNamespace): void
    {
        $this->controllerNamespace = $controllerNamespace;
    }

    /**
     * @return string
     */
    public function getControllerNamespace(): string
    {
        return $this->controllerNamespace;
    }

    /**
     * @param string $viewsPath
     */
    protected function setViewsPath(string $viewsPath): void
    {
        $this->viewsPath = $viewsPath;
    }

    /**
     * @return string
     */
    public function getViewsPath(): string
    {
        return $this->viewsPath;
    }
}