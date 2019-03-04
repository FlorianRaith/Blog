<?php


namespace App\Core\Http;


use App\Core\Http\Response\JsonResponse;
use App\Core\Http\Response\RedirectResponse;
use App\Core\Http\Response\RenderResponse;
use App\Core\Http\Response\Response;

/**
 * Trait ControllerTrait
 * @package App\Core\Http
 */
trait ControllerTrait
{
    /**
     * @param string $viewName
     * @param array $data
     * @return Response
     */
    public function render(string $viewName, array $data = []): Response
    {
        return new RenderResponse(200, $viewName, $data);
    }

    /**
     * @param string $route
     * @param array $parameters
     * @return Response
     */
    public function redirect(string $route, array $parameters = []): Response
    {
        return new RedirectResponse($route, $parameters);
    }

    /**
     * @param string $text
     * @return Response
     */
    public function text(string $text): Response
    {
        return new Response(200, Response::PLAIN_CONTENT_TYPE, $text);
    }

    /**
     * @param string $html
     * @return Response
     */
    public function html(string $html): Response
    {
        return new Response(200, Response::HTML_CONTENT_TYPE, $html);
    }

    /**
     * @param mixed $json
     * @return Response
     */
    public function json($json): Response
    {
        return new JsonResponse(200, $json);
    }
}