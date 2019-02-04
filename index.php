<?php

require_once __DIR__ . '/vendor/autoload.php';


use App\Application;
use App\Core\Request;
use App\Core\RequestHandler;

// create a request handler
$requestHandler = new RequestHandler();

// setup the application
$app = new Application();
$app->run($requestHandler->getRouter());

// handle the current request
$request = Request::createFromGlobals();
$requestHandler->handleRequest($request);

var_dump($requestHandler->getRouter()->getRegisteredRoutes());