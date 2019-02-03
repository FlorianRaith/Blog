<?php


namespace App\Core\Request;


use App\Core\Request;

/**
 * Class GetRequest
 * @package App\Core\Request
 */
class GetRequest extends Request
{
    /**
     *
     */
    const METHOD = 'GET';

    /**
     * GetRequest constructor.
     * @param string $uri
     */
    protected function __construct(string $uri)
    {
        parent::__construct(self::METHOD, $uri);
    }


}