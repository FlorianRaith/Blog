<?php


namespace App\Core;


use App\Core\Request\GetRequest;
use App\Core\Request\PostRequest;

/**
 * Class Request
 * @package App\Core
 */
abstract class Request
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
    protected function __construct(string $method, string $uri)
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

        switch ($method) {
            case GetRequest::METHOD:
                return new GetRequest($uri);
            case PostRequest::METHOD:
                return new PostRequest($uri);
            default:
                return null;
        }
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