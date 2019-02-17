<?php


namespace Tests\Mock;


use App\Core\Request;
use App\Core\Response\Response;

/**
 * Class MockController
 * @package Tests\Mock
 */
class MockController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function action(Request $request): Response
    {
        return new Response(200, Response::PLAIN_CONTENT_TYPE, 'success');
    }
}