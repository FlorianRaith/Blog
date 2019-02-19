<?php


namespace App\Controller;


use App\Core\ControllerTrait;
use App\Core\Request;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController
{
    use ControllerTrait;

    public function index()
    {
        return $this->json(['status' => 'ok', 'message' => 'Hello World']);
    }


    public function redirectTest()
    {
        return $this->redirect('post', ['post_id' => 'test']);
    }


    public function showPost(Request $request)
    {
        return $this->html('
            <h1>Post <small>#' . $request->parameter('post_id') . '</small></h1>
        ');
    }
}