<?php


namespace App\Core\Http;


use App\Core\AbstractApplication;
use App\Core\Http\Response\Response;

/**
 * Class ControllerFunction
 * @package App\Core\Http
 */
class ControllerFunction
{
    /**
     * @var bool
     */
    private $hasClassPath;

    /**
     * @var string
     */
    private $className;

    /**
     * @var string
     */
    private $functionName;

    /**
     * ControllerFunction constructor.
     * @param string $className
     * @param string $functionName
     */
    public function __construct(?string $className, ?string $functionName)
    {
        if($functionName == null && substr_count($className, '@') == 1) {
            $parts = explode('@', $className);
            $this->hasClassPath = false;
            $this->className = $parts[0];
            $this->functionName = $parts[1];
        } else {
            $this->hasClassPath = true;
            $this->className = $className;
            $this->functionName = $functionName;
        }
    }

    /**
     * @param AbstractApplication $application
     * @return string
     */
    public function getClass(AbstractApplication $application): ?string
    {
        if(!isset($this->className)) return null;
        if($this->hasClassPath) $fullClass = $this->className;
        else $fullClass = $application->getControllersPath() . '\\' . $this->className;

        if(class_exists($fullClass)) return $fullClass;
        return null;
    }

    /**
     * @param AbstractApplication $app
     * @param $controllerInstance
     * @param Request $request
     * @return Request|null
     * @throws \ReflectionException
     */
    public function invoke(AbstractApplication $app, $controllerInstance, Request $request): ?Response
    {
        if(!isset($this->className) || !isset($this->functionName)) return null;
        if(!method_exists($controllerInstance, $this->functionName)) return null;
        $reflect = new \ReflectionMethod($this->getClass($app), $this->functionName);
        if($reflect->getNumberOfParameters() == 1) return $controllerInstance->{$this->functionName}($request);

        return $controllerInstance->{$this->functionName}();
    }

    public function __toString()
    {
        return $this->className . '@' . $this->functionName;
    }

}