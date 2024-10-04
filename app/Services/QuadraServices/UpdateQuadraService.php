<?php

namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Dao\LocadorDAO;
use App\Helpers\Validator;
use App\Models\Locador;
use App\Models\Quadra;
use App\Traits\LocadorTrait;

class UpdateQuadraService {
    use LocadorTrait;

    public function __construct() {
        $this->checkLocador();
    }

    public function run(int $id, array $data) {
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
        if (!Validator::notEmpty(value: $data['horarios_funcionamento'])) {
            $errors['horarios_funcionamento'] = 'Obrigatório espicificar o horário de funcionamento';
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

    public static function getQuadra(int $id) {
        $quadraDAO = new QuadraDAO();

        $quadra = $quadraDAO->find($id);

        return $quadra;
    }
}
