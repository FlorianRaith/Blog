<?php


namespace App;


use App\Controller\BlogController;
use App\Core\AbstractApplication;
use App\Core\Router;
use App\Service\TestService;

/**
 * Class Application
 * @package App
 */
class Application extends AbstractApplication
{
    /**
     *
     */
    public function boot(): void
    {
        $this->registerService('test', new TestService());
    }

    /**
     * @param Router $router
     */
    public function registerRoutes(Router $router): void
    {
        $router->get('/', BlogController::class, 'index');
        $router->get('/redirectTest', BlogController::class, 'redirectTest');
        $router->get('/testService', BlogController::class, 'testService');
        $router->get('/post/{post_id}', BlogController::class, 'showPost')->setName('post');
    }
}