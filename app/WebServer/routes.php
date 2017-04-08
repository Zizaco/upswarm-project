<?php

/**
 * --------------------------------------------------------------------------
 * WebServer Routes
 * --------------------------------------------------------------------------
 *
 * Here is where you can register the routes for an application.
 * WebServerService will load this file and call the Service that should
 * be handle the request.
 */

$router->addRoute('GET', '/', 'App\\HelloWorld\\Controller@welcome');
$router->addRoute('GET', '/hello[/{name}]', 'App\\HelloWorld\\Controller@hello');
