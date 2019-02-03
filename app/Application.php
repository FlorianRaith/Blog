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

        $router->get('/', BlogController::class, 'show');
        $router->get('/post/{id}', BlogController::class, 'showAll');
    }
}