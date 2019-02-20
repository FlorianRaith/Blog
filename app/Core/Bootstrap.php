<?php


namespace App\Core;


/**
 * Class Bootstrap
 * @package App\Core
 */
class Bootstrap
{
    /**
     * @var AbstractApplication
     */
    private $application;

    /**
     *
     */
    public function run()
    {
        // create a request handler
        $requestHandler = new RequestHandler();
        $requestHandler->setApp($this->application);

        // boot the application
        $this->application->boot();
        $this->application->registerRoutes($requestHandler->getRouter());

        // create request object from globals
        $request = Request::createFromGlobals();

        // handle request and possible exceptions
        try {
            $requestHandler->handleRequest($request);
        } catch (\Exception $e) {
            $requestHandler->handleException($e);
        }
    }

    /**
     * @param AbstractApplication $application
     */
    public function setApplication(AbstractApplication $application): void
    {
        $this->application = $application;
    }
}