<?php

namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Helpers\Validator;
use App\Traits\LocadorTrait;

class UpdateQuadraService extends BaseQuadraService {
    use LocadorTrait;

    public function __construct() {
        $this->checkLocador();
    }

    public function run(int $id, int $locadorId, ?array $data = null) {
        if (!$data) {
            $showQuadraService = new ShowQuadraService();
            $quadra = $showQuadraService->run($id, $locadorId);
            return $quadra;
        }

        $errors = $this->validate(data: $data);

        if (count(value: $errors) === 0) {
            $quadraDAO = new QuadraDAO();
            $this->updateQuadra(id: $id, data: $data);
        }
        return $errors;
    }

    private function validate (array $data) {
        $errors = [];
        if (!Validator::notEmpty(value: $data['identificador'])) {
            $errors['identificador'] = 'Obrigatório espicificar o tipo de quadra';
        }
        if (!Validator::notEmpty(value: $data['tamanho_quadra'])) {
            $errors['tamanho_quadra'] = 'Obrigatório espicificar o tamanho da quadra';
        }
        if (!Validator::notEmpty(value: $data['quant_min_jogadores'])) {
            $errors['quant_min_jogadores'] = 'Obrigatório espicificar a quantidade mínima de jogadores';
        }
        if (!Validator::notEmpty(value: $data['valor_aluguel'])) {
            $errors['valor_aluguel'] = 'Obrigatório espicificar o valor da quadra';
        }
        return $errors;
    }

    private function updateQuadra(int $id, array $data) {
        $quadraDAO = new QuadraDAO();
        $quadraDAO->update($id, $data);
    }
}
