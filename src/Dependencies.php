<?php

$injector = new \Auryn\Injector;

// HttpRequest dependencies
$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');
$injector->define('Http\HttpRequest', [
   ':get' => $_GET,
   ':post' => $_POST,
   ':cookies' => $_COOKIE,
   ':files' => $_FILES,
   ':server' => $_SERVER,
]);

// HttpResponse dependencies
$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

// Mustache dependencies
$injector->define('Mustache_engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(__DIR__ . '/../templates', [
            'extension' => '.html',
        ]),
    ],
]);

// Twig dependencies
$injector->delegate('Twig_Environment', function() use ($injector) {
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});

// Which template engine do we want to use?
//$injector->alias('BaseTranslator\Template\Renderer', 'BaseTranslator\Template\MustacheRenderer');
$injector->alias('BaseTranslator\Template\Renderer', 'BaseTranslator\Template\TwigRenderer');
$injector->alias('BaseTranslator\Template\FrontendRenderer', 'BaseTranslator\Template\FrontendTwigRenderer');

// Page dependencies
$injector->define('BaseTranslator\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->alias('BaseTranslator\Page\PageReader', 'BaseTranslator\Page\FilePageReader');
$injector->share('BaseTranslator\Page\FilePageReader');

// Menu dependencies
$injector->alias('BaseTranslator\Menu\MenuReader', 'BaseTranslator\Menu\ArrayMenuReader');
$injector->share('BaseTranslator\Menu\ArrayMenuReader');

return $injector;