<?php


namespace App\Core;


use App\Core\Response\JsonResponse;
use App\Core\Response\RedirectResponse;
use App\Core\Response\Response;

/**
 * Trait ControllerTrait
 * @package App\Core
 */
trait ControllerTrait
{
    /**
     * @return Response
     */
    public function render(): Response
    {
        return null;
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