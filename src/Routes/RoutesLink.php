<?php

namespace HenriqueBS0\LinkPack\Routes;

use HenriqueBS0\LinkPack\Controllers\ControllerLink;
use HenriqueBS0\LinkPack\Middlewares\MiddlewareAuthentication;
use HenriqueBS0\Router\RoutesGroup;

class RoutesLink extends RoutesGroup {
    protected function setRoutes(): void
    {
        $this->addMiddleware(MiddlewareAuthentication::class);
        $this->group('/link');

        $this->get('/', [ControllerLink::class, 'list']);
        $this->get('/{id}', [ControllerLink::class, 'detail']);
        $this->post('/', [ControllerLink::class, 'create']);
        $this->put('/{id}', [ControllerLink::class, 'update']);
        $this->delete('/{id}', [ControllerLink::class, 'destroy']);
    }
}