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

        $router->get('/', BlogController::class, 'showAll');
        $router->get('/post/{post_id}', BlogController::class, 'show');
        $router->get('/post/{post_id}/comment/{comment_id}', BlogController::class, 'showComment');
    }
}