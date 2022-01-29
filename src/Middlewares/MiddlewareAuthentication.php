<?php

namespace HenriqueBS0\LinkPack\Middlewares;

use HenriqueBS0\Router\Middleware;

class MiddlewareAuthentication extends Middleware {
    public function checks(): bool
    {
       return session('logged') ? true : false;
    }

    public function invalidated(): void
    {
        view('401');
    }
}