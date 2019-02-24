<?php


namespace App\Core\Http;


/**
 * Class Route
 * @package App\Core\Http
 */
class Route
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $path;

    /**
     * @var ControllerFunction
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
     * @param ControllerFunction $controllerFunction
     */
    public function __construct(string $method, string $path, ControllerFunction $controllerFunction)
    {
        $this->method = $method;
        $this->path = $path;
        $this->controllerFunction = $controllerFunction;
        $this->generateRegex();
    }

    /**
     *
     */
    private function generateRegex(): void
    {
        $trimmedPath = trim($this->path, '/');

        if(empty($trimmedPath)) {
            $this->regex = '/^\/*$/';
            return;
        }

        $paths = explode('/', $trimmedPath);

        $this->regex = '/^';

        foreach($paths as $part) {
            $this->regex .= '\/';

            if($part[0] == '{' && $part[strlen($part) - 1] == '}') {
                $this->regex .= '(\w+)';
                array_push($this->parameters, substr($part, 1, -1));
            } else {
                $this->regex .= $part;
            }
        }

         $this->regex .= '\/*$/';
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
     * @return ControllerFunction
     */
    public function getControllerFunction(): ControllerFunction
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

    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
            $this->name = $name;
    }
}