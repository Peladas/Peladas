<?php

namespace App\Controllers;

use App\Services\LoginService;
use App\Services\RegistrationService;

class LoginController extends Controller {

    public function register() {
        $args = [];
        if ($this->getMethod() === 'get') {
            return $this->render('register');
        };

        $data = $this->getBody();

        $registrationService = new RegistrationService();
        $errors = $registrationService->run($data);

        if (count($errors) > 0) {
            return $this->render('register', compact('errors', 'data'));
        }

        header('Location: /');
    }

    public function login() {
        $args = [];
        if ($this->getMethod() === 'get') {
            return $this->render('login');
        };

        $data = $this->getBody();

        $loginService = new LoginService();
        $errors = $loginService->run($data);

        if (count($errors) > 0) {
            return $this->render('login', compact('errors', 'data'));
        }

        header('Location: /');
    }

    public function logout() {
        $_SESSION = [];

        header('Location: /');
    }
}
