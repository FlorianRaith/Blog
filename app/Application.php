<?php


namespace App;


use App\Core\AbstractApplication;
use App\Core\Http\Router;
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
        $this->setControllerNamespace('App\Controller');
        $this->setViewsPath(PROJECT_ROOT . '/views');
        $this->registerService('test', new TestService());
    }

    /**
     * @param Router $router
     */
    public function registerRoutes(Router $router): void
    {
        $router->get('/', 'BlogController@index');
        $router->get('/post/{post_id}', 'BlogController@post')->setName('post');
    }
}