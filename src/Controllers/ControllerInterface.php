<?php

namespace HenriqueBS0\LinkPack\Controllers;

class ControllerInterface {

    public function home() {
        view('home');
    }

    public function dashboard() {
        view('dashboard');
    }
}