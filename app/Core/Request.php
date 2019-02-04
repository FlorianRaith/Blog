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
}