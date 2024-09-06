<?php

namespace App\Services\LoginServices;

use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;
use App\Dao\UserDAO;
use App\Helpers\Validator;

class RegistrationService {
    public function run(array $data) {
        $errors = $this->validate($data);
        //var_dump($data);

        if (count($errors) === 0) {
            $userDAO = new UserDAO();
            $userId = $userDAO->create([
                'email' => $data['email'],
                'telefone' => $data['phone'],
                'senha' => password_hash($data['password1'], PASSWORD_BCRYPT),
            ]);

            switch ($data['user_type']) {
                case 'jogador':
                    $this->createJogador($userId, $data);
                    break;
                case 'locador':
                    $this->createLocador($userId, $data);
                    break;
                default:
                    break;
            }

        }

        return $errors;
    }

    private function validate (array $data) {
        $errors = [];
        if (!Validator::notEmpty($data['email'])) {
            $errors['email'] = 'E-mail obrigatório';
        }
        if (!Validator::email($data['email'])) {
            $errors['email'] = 'E-mail inválido';
        }
        if (!Validator::notEmpty($data['phone'])) {
            $errors['phone'] = 'Telefone obrigatório';
        }
        if (!Validator::phone($data['phone'])) {
            $errors['phone'] = 'Telefone inválido';
        }
        if (!Validator::notEmpty($data['password1'])) {
            $errors['password1'] = 'Senha obrigatória';
        }
        if (!Validator::same($data['password1'], $data['password2'])) {
            $errors['password2'] = 'Senhas não coincidem';
        }
        if ($data['user_type'] === 'jogador') {
            if (!Validator::notEmpty($data['jogador-name'])) {
                $errors['jogador-name'] = 'Nome obrigatório';
            }
            if (!Validator::stringMin($data['jogador-name'], 3)) {
                $errors['jogador-name'] = 'Nome muito curto';
            }
            if (!Validator::notEmpty($data['cpf'])) {
                $errors['cpf'] = 'CPF obrigatório';
            }
            if (!Validator::cpf($data['cpf'])) {
                $errors['cpf'] = 'CPF inválido';
            }
        } else {
            if (!Validator::notEmpty($data['locador-name'])) {
                $errors['locador-name'] = 'Nome obrigatório';
            }
            if (!Validator::stringMin($data['locador-name'], 3)) {
                $errors['locador-name'] = 'Nome muito curto';
            }
            if (!Validator::notEmpty($data['cnpj'])) {
                $errors['cnpj'] = 'CNPJ obrigatório';
            }
            //if (!Validator::cnpj($data['cnpj'])) {
                //$errors['cnpj'] = 'CNPJ inválido';
            //}
        }
        return $errors;
    }

    private function createJogador(int $userId, array $data) {
        $jogadorDAO = new JogadorDAO();
        $jogadorDAO->create([
            'usuario_id' => $userId,
            'nome_jogador' => $data['jogador-name'],
            'apelido' => $data['jogador-alias'],
            'cpf' => $data['cpf'],
            'data_nascimento' => $data['birthday'],
        ]);
    }

    private function createLocador(int $userId, array $data) {
        $locadorDAO = new LocadorDAO();
        $locadorDAO->create([
            'usuario_id' => $userId,
            'razao_social' => $data['locador-name'],
            'nome_fantasia' => $data['locador-alias'],
            'cnpj' => $data['cnpj'],
        ]);
    }
}
