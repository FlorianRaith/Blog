<?php


namespace App\Core\Request;


use App\Core\Request;

/**
 * Class PostRequest
 * @package App\Core\Request
 */
class PostRequest extends Request
{
    /**
     *
     */
    const METHOD = 'POST';

    /**
     * PostRequest constructor.
     * @param string $uri
     */
    protected function __construct(string $uri)
    {
        parent::__construct(self::METHOD, $uri);
    }
}