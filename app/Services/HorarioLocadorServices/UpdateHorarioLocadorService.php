<?php

namespace App\Services\HorarioLocadorServices;

use App\Dao\HorarioLocadorDAO;
use App\Exceptions\UnauthorizedException;
use App\Helpers\Validator;

class UpdateHorarioLocadorService {
    public function run(int $id, int $locadorId, ?array $data = null) {
        $horarioDAO = new HorarioLocadorDAO();
        $horario = $horarioDAO->find($id);

        if ($horario->getLocadorId() !== $locadorId) {
            throw new UnauthorizedException('Você não pode visualizar as informações dessa quadra');
        }

        $errors = $this->validate(data: $data);

        if (count($errors) === 0) {
            $horarioDAO = new HorarioLocadorDAO();
            $horario = $horarioDAO->update($id, $data);
        }
        return $errors;

    }
    private function validate (array $data) {
        $errors = [];
        if (!Validator::notEmpty(value: $data['dia_semana'])) {
            $errors['dia_semana'] = 'Obrigatório espicificar o dia da semana';
        }
        if (!Validator::notEmpty(value: $data['hora_inicio'])) {
            $errors['hora_inicio'] = 'Obrigatório espicificar a hora de início';
        }
        if (!Validator::notEmpty(value: $data['hora_fim'])) {
            $errors['hora_fim'] = 'Obrigatório espicificar o horario de fim';
        }
        return $errors;
    }
}
