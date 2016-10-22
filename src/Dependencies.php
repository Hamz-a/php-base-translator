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

// Twig dependencies
$injector->delegate('Twig_Environment', function() use ($injector) {
    $loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});

// Twig rendering
$injector->alias('BaseTranslator\Template\Renderer', 'BaseTranslator\Template\TwigRenderer');
$injector->alias('BaseTranslator\Template\FrontendRenderer', 'BaseTranslator\Template\FrontendTwigRenderer');

// Translator dependencies
$injector->share('BaseTranslator\Translators\Base64');
$injector->share('BaseTranslator\Translators\Binary');
$injector->share('BaseTranslator\Translators\Decimal');
$injector->share('BaseTranslator\Translators\Hexadecimal');
$injector->share('BaseTranslator\Translators\Octal');
$injector->share('BaseTranslator\Translators\Text');

$injector->share('BaseTranslator\Translators\Translate');
$injector->define('BaseTranslator\Translators\Translate', [[
    'BaseTranslator\Translators\Base64',
    'BaseTranslator\Translators\Binary',
    'BaseTranslator\Translators\Decimal',
    'BaseTranslator\Translators\Hexadecimal',
    'BaseTranslator\Translators\Octal',
    'BaseTranslator\Translators\Text',
]]);


return $injector;