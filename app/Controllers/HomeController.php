<?php

namespace App\Controllers;

class HomeController extends Controller
{
    // public function __construct() {
    //     parent::__construct();
    // }

    public function index()
    {
        if (!$this->is_logged) {
            return $this->render('home');
        }

        $viewName = ($this->userType === 'jogador') ? 'home_jogador' : 'home_locador';

        return $this->render($viewName);
    }
}
