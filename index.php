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

// create request object from globals
$request = Request::createFromGlobals();

// handle request and possible exceptions
try {
    $requestHandler->handleRequest($request);
} catch (\Exception $e) {
    $requestHandler->handleException($e);
}