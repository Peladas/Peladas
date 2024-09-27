<?php

namespace App\Controllers;

use App\Services\LoginService;
use App\Services\RegistrationService;

class LoginController extends Controller {

    public function register(): void {
        $args = [];
        if ($this->getMethod() === 'get') {
            $this->render(view: 'register');
        };

        $data = $this->getBody();

        $registrationService = new RegistrationService();
        $errors = $registrationService->run(data: $data);
        //var_dump([$data, $errors]);

        if (count(value: $errors) > 0) {
            $this->render(view: 'register', data: compact('errors', 'data'));
        }

        header(header: 'Location: /');
    }

    public function login() {
        $args = [];
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'login');
        };

        $data = $this->getBody();

        $loginService = new LoginService();
        $errors = $loginService->run(data: $data);

        if (count(value: $errors) > 0) {
            return $this->render(view: 'login', data: compact(var_name: 'errors', var_names: 'data'));
        }

        header(header: 'Location: /home_jogador');
    }

    public function logout(): void {
        $_SESSION = [];

        header(header: 'Location: /');
    }
}
