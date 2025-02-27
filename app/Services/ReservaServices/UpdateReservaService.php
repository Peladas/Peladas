<?php

namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Dao\LocadorDAO;
use App\Dao\ReservaDAO;
use App\Helpers\Validator;
use App\Models\Locador;
use App\Models\Quadra;
use App\Traits\JogadorTrait;

class UpdateReservaService {
    use JogadorTrait;

    public function __construct() {
        $this->checkJogador();
    }

    public function run(int $id, array $data) {
        $errors = $this->validate(data: $data);

        if (count(value: $errors) === 0) {
            $quadraDAO = new QuadraDAO();
            $this->updateReserva(id: $id, data: $data);
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
        if (!Validator::notEmpty(value: $data['quant_max_jogadores'])) {
            $errors['quant_max_jogadores'] = 'Obrigatório espicificar a quantidade mínima de jogadores';
        }
        if (!Validator::notEmpty(value: $data['horarios_funcionamento'])) {
            $errors['horarios_funcionamento'] = 'Obrigatório espicificar o horário de funcionamento';
        }
        if (!Validator::notEmpty(value: $data['valor_aluguel'])) {
            $errors['valor_aluguel'] = 'Obrigatório espicificar o valor da quadra';
        }
        return $errors;
    }

    private function updateReserva(int $id, array $data) {
        $reservaDAO = new QuadraDAO();
        $reservaDAO->update($id, $data);
    }

    public static function getReserva(int $id) {
        $reservaDAO = new ReservaDAO();

        $reserva = $reservaDAO->find($id);

        return $reserva;
    }
}
