<?php


namespace App\Core\Http\Response;


class RenderResponse extends Response
{
    /**
     * @var string
     */
    private $viewName;

    /**
     * @var array
     */
    private $data;

    /**
     * RenderResponse constructor.
     * @param int $status_code
     * @param string $viewName
     * @param array $data
     * @param array $additionalHeaders
     */
    public function __construct(int $status_code, string $viewName, array $data, array $additionalHeaders = [])
    {
        $this->viewName = $viewName;
        $this->data = $data;
        parent::__construct($status_code, Response::HTML_CONTENT_TYPE, '', $additionalHeaders);
    }

    /**
     * @return string
     */
    public function getViewName(): string
    {
        return $this->viewName;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
}