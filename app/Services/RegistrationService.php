<?php

namespace App\Services;

use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;
use App\Dao\UserDAO;
use App\Helpers\Validator;
use App\Models\Jogador;
use App\Models\Locador;
use App\Models\User;

class RegistrationService {
    public function run(array $data): array {
        $errors = $this->validate($data);
        //var_dump($data);

        if (count(value: $errors) === 0) {
            $newUser = new User();
            $newUser->setEmail(email: $data["email"])
                ->setSenha(senha: password_hash(password: $data['password1'], algo: PASSWORD_BCRYPT))
                ->setTelefone(telefone: $data["phone"])
                ->setAtivo(ativo: true);

            $userDAO = new UserDAO();
            $userId = $userDAO->create(user: $newUser);

            switch ($data['user_type']) {
                case 'jogador':
                    $this->createJogador(userId: $userId, data: $data);
                    break;
                case 'locador':
                    $this->createLocador(userId: $userId, data: $data);
                    break;
                default:
                    break;
            }
        }
        return $errors;
    }

    private function validate (array $data): array {
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

        if(! isset($data['user_type']))
            $errors['user_type'] = 'Informe o tipo do usuário';
        else if ($data['user_type'] === 'jogador') {
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
            if (!Validator::minAge($data['birthday'])) {
                $errors['birthday'] = 'Não possui idade mínima necessária de 16 anos';
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
            if (!Validator::cnpj($data['cnpj'])) {
                $errors['cnpj'] = 'CNPJ inválido';
            }
        }
        return $errors;
    }

    private function createJogador(int $userId, array $data): void {
        $newJogador = new Jogador();
        $newJogador->setId(id: $userId)
            ->setNomeJogador( nome_jogador: $data["jogador-name"])
            ->setApelido(apelido: $data["jogador-alias"])
            ->setCpf(cpf: $data["cpf"])
            ->setDataNascimento(data_nascimento: $data["birthday"]);

        $jogadorDAO = new JogadorDAO();
        $jogadorDAO->create(jogador: $newJogador);
    }

    private function createLocador(int $userId, array $data): void {
        $newLocador = new Locador();
        $newLocador->setId(id: $userId)
            ->setNomeFantasia(nome_fantasia: $data["locador-name"])
            ->setRazaoSocial(razao_social: $data["locador-alias"])
            ->setCnpj(cnpj: $data["cnpj"]);

        $locadorDAO = new LocadorDAO();
        $locadorDAO->create(locador: $newLocador);
    }
}
