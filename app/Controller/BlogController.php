<?php


namespace App\Controller;


use App\Core\Http\AbstractController;
use App\Core\Http\Request;
use App\Service\TestService;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController extends AbstractController
{

    public function index()
    {
        return $this->json(['status' => 'ok', 'message' => 'Hello World']);
    }


    public function redirectTest()
    {
        return $this->redirect('post', ['post_id' => 'test']);
    }

    public function testService()
    {
        /** @var TestService $testService */
        $testService = $this->getApp()->getService('test');

        return $this->text($testService->getTest());
    }

    public function showPost(Request $request)
    {
        return $this->html('
            <h1>Post <small>#' . $request->parameter('post_id') . '</small></h1>
        ');
    }
}