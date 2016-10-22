<?php

namespace BaseTranslator;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

//$environment = 'production';
$environment = 'development';

$whoops = new \Whoops\Run;
if($environment !== 'production') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler());
} else {
    $whoops->pushHandler(function($e) {
        echo 'Something went wrong...';
    });
}
$whoops->register();

$injector = include('Dependencies.php');

$request = $injector->make('Http\HttpRequest');
$response = $injector->make('Http\HttpResponse');

$dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {
    $routes = include('Routes.php');
    foreach($routes as $route) {
        $r->addRoute($route[0], $route[1], $route[2]);
    }
});

$routeInfo = $dispatcher->dispatch($request->getMethod(), $request->getPath());
switch($routeInfo[0]) {
    case \FastRoute\Dispatcher::NOT_FOUND:
        $response->setContent('404 - Are you on the right track?');
        $response->setStatusCode(404);
        break;
    case \FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $response->setContent('405 - Bad boy/girl');
        $response->setStatusCode(405);
        break;
    case \FastRoute\Dispatcher::FOUND:
        $className = $routeInfo[1][0];
        $method = $routeInfo[1][1];
        $vars = $routeInfo[2];

        $class = $injector->make($className);
        $class->$method($vars);
        break;
}

foreach($response->getHeaders() as $header) {
    header($header, false);
}

echo $response->getContent();