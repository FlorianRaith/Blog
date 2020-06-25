<?php


namespace Core\Http;


use Core\AbstractApplication;

/**
 * Class AbstractController
 * @package Core\Http
 */
abstract class AbstractController
{
    use ControllerTrait;

    /**
     * @var AbstractApplication
     */
    private $app;

    /**
     * @return AbstractApplication
     */
    protected function getApp(): AbstractApplication
    {
        return $this->app;
    }

    /**
     * @param AbstractApplication $app
     */
    function setApp(AbstractApplication $app): void
    {
        $this->app = $app;
    }
}