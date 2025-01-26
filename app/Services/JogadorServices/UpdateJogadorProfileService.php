<?php

namespace App\Services\JogadorServices;

use App\Dao\JogadorDAO;
use App\Dao\UserDAO;
use App\Helpers\Formatter;
use App\Helpers\Log;
use App\Helpers\Validator;
use App\Models\Jogador;
use App\Models\User;

class UpdateJogadorProfileService {
    public function run (User $user, Jogador $jogador, ?array $data = null) {
        // var_dump($data);die;

        $errors = $this->validate($data);

        if (count($errors) === 0) {
            $this->updateUser($user, $data);
            $this->updateJogador($jogador, $data);
        }
        return $errors;
    }

    private function validate (array $data): array {
        $errors = [];

        if (!Validator::notEmpty($data['telefone'])) {
            $errors['telefone'] = 'Telefone obrigatório';
        } elseif (!Validator::phone($data['telefone'])) {
            $errors['telefone'] = 'Telefone inválido';
        }

        if (!Validator::notEmpty($data['nome_jogador'])) {
            $errors['nome_jogador'] = 'Nome obrigatório';
        } elseif (!Validator::stringMin($data['nome_jogador'], 3)) {
            $errors['nome_jogador'] = 'Nome muito curto';
        }

        if (!Validator::notEmpty($data['cpf'])) {
            $errors['cpf'] = 'CPF obrigatório';
        } elseif (!Validator::cpf($data['cpf'])) {
            $errors['cpf'] = 'CPF inválido';
        }

        if (!Validator::notEmpty($data['data_nascimento'])) {
            $errors['data_nascimento'] = 'Data de nascimento obrigatória';
        } elseif (!Validator::minAge($data['data_nascimento'])) {
            $errors['data_nascimento'] = 'Não possui idade mínima necessária de 16 anos';
        }
        return $errors;
    }

    private function updateUser(User $user, array $data): void {
        Log::info(json_encode($data));
        $userDAO = new UserDAO();
        $filteredData = [];
        $fields = [
            'telefone',
        ];
        foreach ($data as $property => $value) {
            if (in_array($property, $fields)) {
                $method = 'get' . Formatter::snakeToPascal($property);
                Log::info($method);
                if ($user->{$method}() != $value) {
                    $filteredData[$property] = $value;
                }
            }
        }

        if (count($filteredData)) {
            $userDAO->update($user->getId(), $filteredData);
        }
    }

    private function updateJogador(Jogador $jogador, array $data): void {
        Log::info(json_encode($data));
        $jogadorDAO = new JogadorDAO();
        $filteredData = [];
        $fields = [
            'nome_jogador',
            'cpf',
            'data_nascimento',
            'apelido',
        ];
        foreach ($data as $property => $value) {
            if (in_array($property, $fields)) {
                $method = 'get' . Formatter::snakeToPascal($property);
                if ($jogador->{$method}() != $value) {
                    $filteredData[$property] = $value;
                }
            }
        }

        if (count($filteredData)) {
            $jogadorDAO->update($jogador->getId(), $filteredData);
        }
    }
}
