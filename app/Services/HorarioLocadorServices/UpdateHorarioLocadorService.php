<?php

namespace App\Services\HorarioLocadorServices;

use App\Dao\HorarioLocadorDAO;
use App\Exceptions\UnauthorizedException;
use App\Helpers\Validator;
use App\Models\HorarioLocador;

class UpdateHorarioLocadorService {
    private int $locadorId;

    public function run(int $locadorId, ?array $data = null) {
        $this->locadorId = $locadorId;

        $errors = $this->validate($data);

        if (count($errors) === 0) {
            $this->updateHorarios($data);
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

    private function updateHorarios(array $data) {
        $horarioDAO = new HorarioLocadorDAO();
        $horarios = $horarioDAO->getAll(['locador_id' => $this->locadorId]);

        for($dia=1; $dia<=7; $dia++) {
            $horarioInicio = "start-time_$dia";
            $horarioFim = "end-time_$dia";

            // TODO
            // - Checar se existe horário no BD para o dia sa semana

            //   - Se existir, checar se existe horário nos dados para o dia da semana
            //     - Se existir, atualizar horário no BD
            //     - Se não existir, eliminar horário do BD
            //   - Se não existir, checar se existe horário nos dados para o dia da semana
            //     - Se existir, criar horário
            //     - Se não existir, ignorar

            $horarioExistente = null;

            // Verificar se existe horário no BD para o dia da semana
            foreach ($horarios as $horario) {
                if ($horario->getDiaSemana() === $dia) {
                    $horarioExistente = $horario;
                    break;
                }
            }

            $horaInicio = $data[$horarioInicio] ?? null;
            $horaFim = $data[$horarioFim] ?? null;

            if ($horarioExistente) {
                // Existe horário no BD para o dia da semana
                if ($horaInicio && $horaFim) {
                    // Atualizar horário no BD
                    $horarioDAO->update($horarioExistente->getId(), [
                        'hora_inicio' => $horaInicio,
                        'hora_fim' => $horaFim
                    ]);
                } else {
                    // Eliminar horário do BD
                    $horarioDAO->delete($horarioExistente->getId());
                }
            } else {
                // Não existe horário no BD para o dia da semana
                if ($horaInicio && $horaFim) {
                    // Criar novo horário no BD
                    $newHorario = new HorarioLocador();
                    $newHorario->setLocadorId($this->locadorId)
                        ->setDiaSemana($dia)
                        ->setHoraInicio($horaInicio)
                        ->setHoraFim($horaFim);

                    $HorarioDAO = new HorarioLocadorDAO();
                    $HorarioDAO->create($newHorario);
                }
                // Caso contrário, ignorar (não é necessário nenhuma ação)
            }



            // if ($data[$horarioInicio])
            // $horario = $horarioDAO->update($horario->getId(), $data);
        }
    }
}
