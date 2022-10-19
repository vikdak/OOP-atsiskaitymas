<?php
require 'vendor/autoload.php';
use Viktorija\Atsiskaitymas\Framework\DIContainer;
use Viktorija\Atsiskaitymas\Framework\Router;

try {
    $container = new DIContainer();
    $router = $container->get(Router::class);
    $method = (isset($_POST['_method'])) ? strtoupper($_POST['_method']) : $_SERVER['REQUEST_METHOD'];
    $router->process($_SERVER['REQUEST_URI'], $method);
}catch(\Exception $exception){
    echo $exception->getMessage().PHP_EOL;
}