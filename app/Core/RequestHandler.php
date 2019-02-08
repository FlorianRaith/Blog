<?php


namespace App\Core;


/**
 * Class RequestHandler
 * @package App\Core
 */
class RequestHandler
{
    /**
     * @var Router
     */
    private $router;

    /**
     * RequestHandler constructor.
     */
    public function __construct()
    {
        $this->router = new Router();
    }

    /**
     * @param Request $request
     * @throws NotFoundException
     */
    public function handleRequest(Request $request): void
    {
        $route = $this->findRouteAndEditRequestParameters($request);

        if($route == null) throw new NotFoundException('The route was not found');
    }

    /**
     * @param Request $request
     * @return Route|null
     */
    private function findRouteAndEditRequestParameters(Request $request): ?Route
    {
        $routes = array_reverse($this->router->getRegisteredRoutes());

        /* @var $route Route */
        foreach ($routes as $route) {

            if(preg_match($route->getRegex(), $request->getUri(), $matches)) {

                // set parameters in request object
                for($i = 0; $i < sizeof($route->getParameters()); $i++) {
                    $request->setParameter($route->getParameters()[$i], $matches[$i + 1]);
                }

                return $route;
            }

        }

        return null;
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }
}