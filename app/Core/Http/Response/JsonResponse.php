<?php


namespace App\Core\Http\Response;


/**
 * Class JsonResponse
 * @package App\Core\Http\Response
 */
class JsonResponse extends Response
{
    /**
     * JsonResponse constructor.
     * @param int $status_code
     * @param mixed $content
     */
    public function __construct(int $status_code, $content)
    {
        parent::__construct($status_code, Response::JSON_CONTENT_TYPE, json_encode($content));
    }

}