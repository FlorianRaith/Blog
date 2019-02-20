<?php


namespace App\Core\Http;


/**
 * Class Router
 * @package App\Core\Http
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
     * @return Route
     */
    public function get(string $path, string $controllerClass, string $methodName): Route
    {
        $route = new Route(Method::GET, $path, $controllerClass, $methodName);
        array_push($this->registeredRoutes, $route);
        return $route;
    }

    /**
     * @param string $path
     * @param string $controllerClass
     * @param string $methodName
     * @return Route
     */
    public function post(string $path, string $controllerClass, string $methodName): Route
    {
        $route = new Route(Method::POST, $path, $controllerClass, $methodName);
        array_push($this->registeredRoutes, $route);
        return $route;
    }

    /**
     * @param string $path
     * @param string $controllerClass
     * @param string $methodName
     * @return Route
     */
    public function put(string $path, string $controllerClass, string $methodName): Route
    {
        $route = new Route(Method::PUT, $path, $controllerClass, $methodName);
        array_push($this->registeredRoutes, $route);
        return $route;
    }

    /**
     * @param string $path
     * @param string $controllerClass
     * @param string $methodName
     * @return Route
     */
    public function delete(string $path, string $controllerClass, string $methodName): Route
    {
        $route = new Route(Method::DELETE, $path, $controllerClass, $methodName);
        array_push($this->registeredRoutes, $route);
        return $route;
    }

    /**
     * @return array
     */
    public function getRegisteredRoutes(): array
    {
        return $this->registeredRoutes;
    }

    /**
     * @param string $name
     * @return Route|null
     */
    public function getRouteByName(string $name): ?Route
    {
        /** @var Route $route */
        foreach ($this->registeredRoutes as $route) {
            if($route->getName() == $name) {
                return $route;
            }
        }
    }
}