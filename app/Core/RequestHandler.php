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
     */
    public function handleRequest(Request $request): void
    {
    }

    /**
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }
}