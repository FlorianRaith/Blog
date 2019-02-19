<?php


namespace App;


use App\Controller\BlogController;
use App\Core\Router;

/**
 * Class Application
 * @package App
 */
class Application
{
    /**
     * @param Router $router
     */
    public function run(Router $router) {

        $router ->get('/', BlogController::class, 'index');
        $router ->get('/redirectTest', BlogController::class, 'redirectTest');
        $router ->get('/post/{post_id}', BlogController::class, 'showPost')->setName('post');


    }
}