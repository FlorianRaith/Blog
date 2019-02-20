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
}