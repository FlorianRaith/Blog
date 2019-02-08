<?php


namespace App\Core;


/**
 * Class Request
 * @package App\Core
 */
class Request
{
    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $uri;

    /**
     * @var array
     */
    private $parameters = [];

    /**
     * Request constructor.
     * @param string $method
     * @param string $uri
     */
    private function __construct(string $method, string $uri)
    {
        $this->method = $method;
        $this->uri = $uri;
    }

    /**
     * @return Request
     */
    public static function createFromGlobals(): Request {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        return new Request($method, $uri);
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
    public function getUri(): string
    {
        return $this->uri;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param string $parameter
     * @return string|null
     */
    public function parameter(string $parameter): ?string
    {
        if(!$this->hasParameter($parameter)) return null;
        return $this->parameters[$parameter];
    }

    /**
     * @param string $parameter
     * @return bool
     */
    public function hasParameter(string $parameter): bool
    {
        return array_key_exists($parameter, $this->parameters);
    }

    /**
     * @param string $parameter
     * @param string $value
     */
    function setParameter(string $parameter, string $value): void
    {
        $this->parameters[$parameter] = $value;
    }
}