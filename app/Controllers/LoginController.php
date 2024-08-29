<?php

namespace App\Controllers;

use App\Services\LoginServices\RegistrationService;

class LoginController extends Controller {
    public function register() {
        $args = [];
        if ($this->getMethod() === 'get') {
            return $this->render('register1');
        };

        $data = $this->getBody();

        $registrationService = new RegistrationService();
        $errors = $registrationService->run($data);

        if (count($errors) > 0) {
            return $this->render('register', compact('errors', 'data'));
        }

        header('Location: /');
    }
}
