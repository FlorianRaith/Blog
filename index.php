<?php

use App\Application;
use App\Core\Bootstrap;

require_once __DIR__ . '/vendor/autoload.php';

$app = new Application();

$bootstrap = new Bootstrap();
$bootstrap->setApplication($app);
$bootstrap->run();