<?php

namespace App\Services\LoginServices;

use App\Dao\UserDAO;
use App\Helpers\Validator;

class LoginService {
    public function run(array $data) {
        $errors = [];
        if (!Validator::notEmpty($data['email'])) {
            $errors['email'] = 'E-mail obrigatório';
        }
        if (!Validator::email($data['email'])) {
            $errors['email'] = 'E-mail inválido';
        }
        if (!Validator::notEmpty($data['password'])) {
            $errors['password'] = 'Senha obrigatória';
        }
        if (count($errors) === 0) {
            $userDAO = new UserDAO();
            $usuario = $userDAO->findLogin(
                $data['email'],
                $data['password']
            );

            if ($usuario) {
                // Login bem-sucedido
                $_SESSION['usuario_id'] = $usuario['id'];
            } else {
                $errors['login'] = 'Usuário ou senha incorretos';
            }
        }

        return $errors;
    }
}
