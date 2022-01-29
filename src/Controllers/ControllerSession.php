<?php

namespace HenriqueBS0\LinkPack\Controllers;

class ControllerSession {

    public function login() {
        session('logged', true);
        redirect('dashboard');
    }

    public function logout() {
        session('logged', false);
        redirect('');
    }
}