<?php


namespace Tests\Mock;


use Core\Http\Request;
use Core\Http\Response\Response;

/**
 * Class MockController
 * @package Tests\Mock
 */
class MockController
{
    /**
     * @return Response
     */
    public function action(): Response
    {
        return new Response(200, Response::PLAIN_CONTENT_TYPE, 'success');
    }
}