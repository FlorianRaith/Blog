<?php


namespace App\Core;


class Route
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $controllerClass;

    /**
     * @var string
     */
    private $controllerFunction;

    /**
     * @var string
     */
    private $regex;

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * Route constructor.
     * @param string $method
     * @param string $path
     * @param string $controllerClass
     * @param string $controllerFunction
     */
    public function __construct(string $method, string $path, string $controllerClass, string $controllerFunction)
    {
        $this->method = $method;
        $this->path = $path;
        $this->controllerClass = $controllerClass;
        $this->controllerFunction = $controllerFunction;
        $this->generateRegex();
    }

    private function generateRegex(): void
    {
        $trimmedPath = trim($this->path, '/');

        if(empty($trimmedPath)) {
            $this->regex = '/\/*/';
            return;
        }

        $paths = explode('/', $trimmedPath);

        $this->regex = '/';

        foreach($paths as $part) {
            $this->regex .= '\/';

            if($part[0] == '{' && $part[strlen($part) - 1] == '}') {
                $this->regex .= '\w+';
                array_push($this->parameters, substr($part, 1, -1));
            } else {
                $this->regex .= $part;
            }
        }

         $this->regex .= '\/*/';
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return string
     */
    public function getControllerClass(): string
    {
        return $this->controllerClass;
    }

    /**
     * @return string
     */
    public function getControllerFunction(): string
    {
        return $this->controllerFunction;
    }

    /**
     * @return string
     */
    public function getRegex(): string
    {
        return $this->regex;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}