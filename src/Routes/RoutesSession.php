<?php

namespace HenriqueBS0\LinkPack\Routes;

use HenriqueBS0\LinkPack\Controllers\ControllerSession;
use HenriqueBS0\Router\RoutesGroup;

class RoutesSession extends RoutesGroup {
    protected function setRoutes(): void
    {
        $this->get('/login', [ControllerSession::class, 'login']);
        $this->get('/logout', [ControllerSession::class, 'logout']);
    }
}