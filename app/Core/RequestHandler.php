<?php


namespace App\Core;


use App\Core\Response\Response;

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
     * @var array
     */
    private $controllers = [];

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

        if($route == null) throw new NotFoundException('A suitable route could not be found');

        $response = $this->callController($route->getControllerClass(), $route->getControllerFunction(), $request);

        if($response == null) throw new NotFoundException('The controller function ' . $route->getControllerClass() . '::' .  $route->getControllerFunction() . ' was not found');

        $this->handleResponse($response);
    }

    /**
     * @param \Exception $exception
     * @return Response
     */
    public function handleException(\Exception $exception): Response
    {
        $response = new Response($exception->getCode(), Response::PLAIN_CONTENT_TYPE, $exception->getMessage());

        $this->handleResponse($response);

        return $response;
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
     * @param string $controllerClass
     * @param string $controllerFunction
     * @param Request $request
     * @return Response
     */
    private function callController(string $controllerClass, string $controllerFunction, Request $request): ?Response
    {
        if(in_array($controllerClass, $this->controllers)) {
            $controllerInstance = $this->controllers[$controllerClass];
        } else {
            $controllerInstance = new $controllerClass;
            $this->controllers[$controllerFunction] = $controllerInstance;
        }

        if(!method_exists($controllerInstance, $controllerFunction)) return null;

        return $controllerInstance->$controllerFunction($request);
    }

    /**
     * @param Response $response
     */
    private function handleResponse(Response $response): void
    {
        http_response_code($response->getStatusCode());
        header($response->getContentType());
        echo $response->getContent();
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }
}