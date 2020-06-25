<?php


namespace Core\Http;


/**
 * Class Request
 * @package Core\Http
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
     * @var string
     */
    private $httpHost;

    /**
     * @var string
     */
    private $rootUrl;

    /**
     * Request constructor.
     * @param string $method
     * @param string $uri
     * @param string $httpHost
     * @param string $rootUrl
     */
    public function __construct(string $method, string $uri, string $httpHost, string $rootUrl)
    {
        $this->method = $method;
        $this->uri = $uri;
        $this->httpHost = $httpHost;
        $this->rootUrl = $rootUrl;
    }

    /**
     * @return Request
     */
    public static function createFromGlobals(): Request {
        $method = $_SERVER['REQUEST_METHOD'];
        $httpHost = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        $root = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . '://' . $httpHost;

        return new Request($method, $uri, $httpHost, $root);
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

    /**
     * @return string
     */
    public function getHttpHost(): string
    {
        return $this->httpHost;
    }

    /**
     * @return string
     */
    public function getRootUrl(): string
    {
        return $this->rootUrl;
    }
}