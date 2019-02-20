<?php


namespace App\Core\Http;


use App\Core\AbstractApplication;

/**
 * Class AbstractController
 * @package App\Core\Http
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