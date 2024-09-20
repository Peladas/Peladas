<?php

namespace App\Services;

use App\Dao\CourtDAO;
use App\Dao\LocadorDAO;
use App\Helpers\Validator;

class CourtService {
    public function run(array $data) {
        $errors = $this->validate($data);
        //var_dump($data);

        if (count($errors) === 0) {
            $locadorDAO = new LocadorDAO();
            $locadorId = $locadorDAO->create([
            ]);

            $this->createQuadra($locadorId, $data);
        }
        return $errors;
    }

    private function validate (array $data) {
        $errors = [];
        if (!Validator::notEmpty($data['identificador'])) {
            $errors['identificador'] = 'Obrigatório espicificar o tipo de quadra';
        }
        if (!Validator::notEmpty($data['tamanho_quadra'])) {
            $errors['tamanho_quadra'] = 'Obrigatório espicificar o tamanho da quadra';
        }
        if (!Validator::notEmpty($data['quant_min_jogadores'])) {
            $errors['quant_min_jogadores'] = 'Obrigatório espicificar a quantidade mínima de jogadores';
        }
        if (!Validator::notEmpty($data['horarios_funcionamento'])) {
            $errors['horarios_funcionamento'] = 'Obrigatório espicificar o horário de funcionamento';
        }
        if (!Validator::notEmpty($data['valor_aluguel'])) {
            $errors['valor_aluguel'] = 'Obrigatório espicificar o valor da quadra';
        }
        return $errors;
    }

    private function createQuadra(int $locadorId, array $data) {
        $courtDAO = new CourtDAO();
        $courtDAO->create([
            'locador_id' => $locadorId,
            'identificador' => $data['identificador'],
            'modalidade' => $data['modalidade'],
            'tamanho_quadra' => $data['tamanho_quadra'],
            'quant_min_jogadores' => $data['quant_min_jogadores'],
            'horarios_funcionamento' => $data['horarios_funcionamento'],
            'descricao' => $data['descricao'],
            'valor_aluguel' => $data['valor_aluguel'],
        ]);
    }
}
