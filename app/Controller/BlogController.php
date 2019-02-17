<?php


namespace App\Controller;


use App\Core\Request;
use App\Core\Response\JsonResponse;
use App\Core\Response\Response;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController
{
    /**
     * @param Request $request
     * @return Response
     */
    public function showAll(Request $request): Response
    {
        return new JsonResponse(200, ['status' => 'ok', 'message' => 'hello world!']);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function show(Request $request): Response
    {
        return new Response(200, Response::HTML_CONTENT_TYPE, '
            <h1>Parameters:</h1>
            <ul>
                <li>Post ID: ' . $request->parameter('post_id') . '</li>
                <li>Comment ID: ' . ($request->parameter('comment_id') ?? 'null') . '</li>
            </ul>
        ');
    }
}