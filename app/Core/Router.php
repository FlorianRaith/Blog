<?php


namespace App\Core;


/**
 * Class Router
 * @package App\Core
 */
class Router
{
    /**
     * @var array
     */
    private $registeredRoutes = [];

    /**
     * @param string $path
     * @param string $controllerClass
     * @param string $methodName
     */
    public function get(string $path, string $controllerClass, string $methodName)
    {
        array_push($this->registeredRoutes, new Route(Method::GET, $path, $controllerClass, $methodName));
    }

    /**
     * @param string $path
     * @param string $controllerClass
     * @param string $methodName
     */
    public function post(string $path, string $controllerClass, string $methodName)
    {
        array_push($this->registeredRoutes, new Route(Method::POST, $path, $controllerClass, $methodName));
    }

    /**
     * @param string $path
     * @param string $controllerClass
     * @param string $methodName
     */
    public function put(string $path, string $controllerClass, string $methodName)
    {
        array_push($this->registeredRoutes, new Route(Method::PUT, $path, $controllerClass, $methodName));
    }

    /**
     * @param string $path
     * @param string $controllerClass
     * @param string $methodName
     */
    public function delete(string $path, string $controllerClass, string $methodName)
    {
        array_push($this->registeredRoutes, new Route(Method::DELETE, $path, $controllerClass, $methodName));
    }

    /**
     * @return array
     */
    public function getRegisteredRoutes(): array
    {
        return $this->registeredRoutes;
    }
}