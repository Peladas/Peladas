<?php

namespace App\Controllers;

use App\Helpers\Validator;

class LoginController extends Controller {
    public function register() {
        $args = [];
        if ($this->getMethod() === 'get') {
            return $this->render('register');
        };

        $data = $this->getBody();
        var_dump($data);

        $error = [];
        if (!Validator::notEmpty($data['name'])) {
            $error['name'] = 'Nome obrigatório';
        }
        if (!Validator::stringMin($data['name'], 3)) {
            $error['name'] = 'Nome muito curto';
        }
        if (!Validator::notEmpty($data['email'])) {
            $error['email'] = 'E-mail obrigatório';
        }
        if (!Validator::email($data['email'])) {
            $error['email'] = 'E-mail inválido';
        }
        if (!Validator::notEmpty($data['phone'])) {
            $error['phone'] = 'Telefone obrigatório';
        }
        if (!Validator::phone($data['phone'])) {
            $error['phone'] = 'Telefone inválido';
        }
        if (!Validator::notEmpty($data['password1'])) {
            $error['password1'] = 'Senha obrigatória';
        }
        if (!Validator::same($data['password1'], $data['password2'])) {
            $error['password2'] = 'Senhas não coincidem';
        }
        if ($data['user_type'] === 'jogador') {
            if (!Validator::notEmpty($data['cpf'])) {
                $error['cpf'] = 'CPF obrigatório';
            }
            if (!Validator::cpf($data['cpf'])) {
                $error['cpf'] = 'CPF inválido';
            }
        } else {
            if (!Validator::notEmpty($data['cnpj'])) {
                $error['cnpj'] = 'CNPJ obrigatório';
            }
            if (!Validator::cnpj($data['cnpj'])) {
                $error['cnpj'] = 'CNPJ inválido';
            }
        }

        return $this->render('register', compact('error', 'data'));
    }
}
