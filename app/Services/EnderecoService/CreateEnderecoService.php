<?php

namespace App\Services\EnderecoService;

use App\Helpers\Validator;
use App\Traits\LocadorTrait;

class CreateEnderecoService {
    use LocadorTrait;
    public function __construct() {
        $this->checkLocador();
    }

    public function run(array $data) {
        $errors = []; //$this->validate(data: $data);
        //var_dump($data);

        // if (count(value: $errors) === 0) {
        //     $locadorId = $this->getLocadorId();
        //     $this->createEndereco(locadorId: $locadorId, data: $data);
        // }
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

?>
