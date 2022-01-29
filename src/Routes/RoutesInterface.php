<?php

namespace HenriqueBS0\LinkPack\Routes;

use HenriqueBS0\LinkPack\Controllers\ControllerInterface;
use HenriqueBS0\LinkPack\Middlewares\MiddlewareAuthentication;
use HenriqueBS0\Router\RoutesGroup;

class RoutesInterface extends RoutesGroup{
    protected function setRoutes(): void
    {
        $this->get('/', [ControllerInterface::class, 'home']);
        $this->get('/dashboard', [ControllerInterface::class, 'dashboard'], [MiddlewareAuthentication::class]);
    }
}