<?php


namespace App\Controller;


use App\Core\Request;

/**
 * Class BlogController
 * @package App\Controller
 */
class BlogController
{
    /**
     * @param Request $request
     */
    public function showAll(Request $request)
    {

    }

    /**
     * @param Request $request
     */
    public function show(Request $request)
    {
        $id = $request->parameter('id');
    }
}