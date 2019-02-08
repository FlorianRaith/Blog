<?php


namespace App\Core;


use Throwable;

/**
 * Class NotFoundException
 * @package App\Core
 */
class NotFoundException extends \Exception
{
    /**
     * NotFoundException constructor.
     * @param string $message
     * @param Throwable|null $previous
     */
    public function __construct(string $message = "", Throwable $previous = null)
    {
        parent::__construct($message, 404, $previous);
    }
}