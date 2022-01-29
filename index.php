<?php

use HenriqueBS0\LinkPack\Routes\RoutesSession;
use HenriqueBS0\LinkPack\Routes\RoutesInterface;
use HenriqueBS0\LinkPack\Routes\RoutesLink;
use HenriqueBS0\Router\Router;

require_once __DIR__ . '/vendor/autoload.php';

$router = new Router();

$router->addRoutesGroup(RoutesInterface::class);
$router->addRoutesGroup(RoutesSession::class);
$router->addRoutesGroup(RoutesLink::class);

$router->setNotFound(function() {
    view('404');
});

$router->resolve();