<?php

namespace App\Controllers;

class LoginController extends Controller {
    public function register() {
        if ($this->getMethod() === 'get') {
            return $this->render('register', ['method' => 'get']);
        };

        return $this->render('register', ['method' => 'post']);
    }
}
