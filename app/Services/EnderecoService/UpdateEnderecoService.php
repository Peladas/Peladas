<?php

namespace App\Services\EnderecoService;

use App\Dao\EnderecoDAO;
use App\Helpers\Validator;
use App\Models\Endereco;

class UpdateEnderecoService {
    private int $locadorId;

    public function run(int $locadorId, ?array $data = null) {
        $this->locadorId = $locadorId;

        $errors = $this->validate($data);

        if (count($errors) === 0) {
            $this->updateEndereco($data);
        }

        return $errors;

    }

    private function validate (array $data) {
        if (!Validator::notEmpty($data['rua'])) {
            $errors['rua'] = 'Obrigatório espicificar a Rua/Avenida';
        }
        if (!Validator::notEmpty($data['numero'])) {
            $errors['numero'] = 'Obrigatório espicificar o número do estabelecimento';
        }
        if (!Validator::notEmpty($data['cep'])) {
            $errors['cep'] = 'Obrigatório espicificar o CEP';
        }
        if (!Validator::notEmpty($data['estado'])) {
            $errors['estado'] = 'Obrigatório espicificar o estado';
        }
        if (!Validator::notEmpty($data['cidade'])) {
            $errors['cidade'] = 'Obrigatório espicificar o cidade';
        }
        if (!Validator::notEmpty($data['bairro'])) {
            $errors['bairro'] = 'Obrigatório espicificar o bairro';
        }
        return $errors;
    }

    private function updateEndereco(array $data) {
        $enderecoDAO = new EnderecoDAO();
        $endereco = $enderecoDAO->first(['locador_id' => $this->locadorId]);

        // - Checar se existe endereco no BD

        //   - Se existir, checar se existe endereco nos dados para o locador
        //     - Se existir, atualizar endereco no BD
        //     - Se não existir, eliminar endereco do BD
        //   - Se não existir, checar se existe endereco nos dados para o locador
        //     - Se existir, criar endereco
        //     - Se não existir, ignorar

        if ($endereco) {
            if (isset($data['endereco'])) {
                // Atualizar o endereço no BD
                $enderecoDAO->update($endereco->getId(), [
                    'rua' => $data['rua'] ?? $endereco->rua,
                    'numero' => $data['numero'] ?? $endereco->numero,
                    'cep' => $data['cep'] ?? $endereco->cep,
                    'estado' => $data['estado'] ?? $endereco->estado,
                    'cidade' => $data['cidade'] ?? $endereco->cidade,
                    'bairro' => $data['bairro'] ?? $endereco->cidade,
                ]);
            } else {
                // Eliminar o endereço do BD
                $enderecoDAO->delete($endereco->getId());
            }
        } else {
            if (!isset($data['endereco'])) {
                // Criar novo endereço no BD
                $newEndereco = new Endereco();
                $newEndereco->setLocadorId($this->locadorId)
                    ->setRua($data['rua'])
                    ->setNumero($data['numero'])
                    ->setCep($data['cep'])
                    ->setEstado($data['estado'])
                    ->setCidade($data['cidade'])
                    ->setBairro($data['bairro']);

                $EnderecoDAO = new EnderecoDAO();
                $EnderecoDAO->create($newEndereco);
            }
        }
    }
}
