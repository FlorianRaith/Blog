<?php


namespace Core;


use Core\Http\Kernel;
use Core\Http\Request;

/**
 * Class Bootstrap
 * @package Core
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
        // create the kernel
        $kernel = new Kernel();
        $kernel->setApp($this->application);

        // boot the application
        $this->application->boot();
        $this->application->registerRoutes($kernel->getRouter());

        // setup view engine
        $kernel->initViewEngine();

        // create request object from globals
        $request = Request::createFromGlobals();

        // handle request and possible exceptions
        try {
            $kernel->handleRequest($request);
        } catch (\Exception $e) {
            $kernel->handleException($e);
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