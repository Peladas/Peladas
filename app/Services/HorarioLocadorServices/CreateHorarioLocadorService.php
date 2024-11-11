<?php

namespace App\Services\HorarioLocadorServices;

use App\Dao\HorarioLocadorDAO;
use App\Helpers\Validator;
use App\Models\HorarioLocador;
use App\Traits\LocadorTrait;

class CreateHorarioLocadorService {
    use LocadorTrait;

    public function __construct() {
        $this->checkLocador();
    }

    public function run(array $data) {
        $errors = []; //$this->validate(data: $data);
        //var_dump($data);

        if (count(value: $errors) === 0) {
            $locadorId = $this->getLocadorId();
            $this->createHorariosLocador(locadorId: $locadorId, data: $data);
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

    private function createHorariosLocador(int $locadorId, array $data) {
        for($dia=1; $dia<=7; $dia++) {
            $newHorario = new HorarioLocador();
            $newHorario->setLocadorId($locadorId)
                ->setDiaSemana($dia)
                ->setHoraInicio($data["start-time_" . $dia])
                ->setHoraFim($data["end-time_" . $dia]);

            $HorarioDAO = new HorarioLocadorDAO();
            $HorarioDAO->create($newHorario);
        }
    }
}
