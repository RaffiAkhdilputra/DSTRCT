<?php

use App\Router;

require_once __DIR__ . '/../vendor/autoload.php';

$router = new Router();
$router->run();
// This file is the entry point for the application.
// It initializes the router and runs it to handle incoming requests.