<?php


namespace App\Core\Http\Response;


/**
 * Class RedirectResponse
 * @package App\Core\Http\Response
 */
class RedirectResponse extends Response
{
    /**
     * @var string
     */
    private $route;

    /**
     * @var array
     */
    private $parameters;

    /**
     * RedirectResponse constructor.
     * @param string $route
     * @param array $parameters
     */
    public function __construct(string $route, array $parameters = [])
    {
        parent::__construct(303, Response::PLAIN_CONTENT_TYPE, '', []);
        $this->route = $route;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     */
    public function getRoute(): string
    {
        return $this->route;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }
}