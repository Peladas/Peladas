<?php

namespace App\Services\ReservaServices;

use App\Dao\ReservaDAO;
use App\Helpers\Validator;
use App\Models\Reserva;

class CreateReservaService {

    public function run(int $jogadorId, array $data) {
        $errors = $this->validate($data);

        if (count(value: $errors) === 0) {
            $this->createReserva($jogadorId,$data);
        }
        return $errors;
    }

    private function validate (array $data) {
        $errors = [];

        if (!Validator::notEmpty(value: $data['quadra_id'])) {
            $errors['quadra_id'] = 'Obrigatório selecionar a quadra';
        }
        if (!Validator::notEmpty(value: $data['data_reserva'])) {
            $errors['data_reserva'] = 'Obrigatório selecionar o dia da partida';
        }
        if (!Validator::notEmpty(value: $data['horario_reservado'])) {
            $errors['horario_reservado'] = 'Obrigatório selecionar um horário para realizar reserva';
        }
        if (!isset($data['tipo_reserva']) || !Validator::notEmpty(value: $data['tipo_reserva'])) {
            $errors['tipo_reserva'] = 'Obrigatório selecionar o tipo da partida!';
        }

        return $errors;
    }

    private function createReserva(int $jogadorId, array $data) {
        $formattedDate = date('Y-m-d H:i:s', strtotime($data["data_reserva"]));
        $newReserva = new Reserva;
        $newReserva->setJogadorId($jogadorId)
            ->setQuadraId($data['quadra_id'])
            ->setTipoReserva($data["tipo_reserva"])
            ->setDataReserva($formattedDate)
            ->setHorarioReservado($data["horario_reservado"]);

        $reservaDAO = new ReservaDAO();
        $reservaDAO->create($newReserva);
    }
}
