<?php

namespace App\Services\EnderecoService;

use App\Dao\EnderecoDAO;
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
        $errors = [];
        // if (!Validator::notEmpty($data['dia_semana'])) {
        //     $errors['dia_semana'] = 'Obrigatório espicificar o dia da semana';
        // }
        // if (!Validator::notEmpty($data['hora_inicio'])) {
        //     $errors['hora_inicio'] = 'Obrigatório espicificar a hora de início';
        // }
        // if (!Validator::notEmpty($data['hora_fim'])) {
        //     $errors['hora_fim'] = 'Obrigatório espicificar o horario de fim';
        // }
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
