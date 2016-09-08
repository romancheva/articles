<?php

use Slim\Views\Twig;
use Slim\Views\TwigExtension;

// Get container
$container = $app->getContainer();

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

// Register component on container
$container['view'] = function ($container) {
    $view = new Twig(INC_ROOT. '/app/views', ['debug' => true]);
    $view->addExtension(new TwigExtension($container['router'], $container['request']->getUri()));
    $view->addExtension(new Twig_Extension_Debug());
    return $view;
};
