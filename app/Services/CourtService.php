<?php

namespace App\Services;

use App\Dao\CourtDAO;
use App\Dao\LocadorDAO;
use App\Helpers\Validator;
use App\Models\Locador;
use App\Models\Quadra;

class CourtService {
    public function run(array $data) {
        $errors = $this->validate(data: $data);
        //var_dump($data);

        if (count(value: $errors) === 0) {
            $newLocador = new Locador();

            $locadorDAO = new LocadorDAO();
            $locadorId = $locadorDAO->create(locador: $newLocador);

            $this->createQuadra(locadorId: $locadorId, data: $data);
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
        if (!Validator::notEmpty(value: $data['horarios_func'])) {
            $errors['horarios_func'] = 'Obrigatório espicificar o horário de funcionamento';
        }
        if (!Validator::notEmpty(value: $data['valor_aluguel'])) {
            $errors['valor_aluguel'] = 'Obrigatório espicificar o valor da quadra';
        }
        return $errors;
    }

    private function createQuadra(int $locadorId, array $data) {
        $newQuadra = new Quadra();
        $newQuadra ->setIdentificador(identificador: $data["identificador"])
        ->setModalidades(modalidades: $data["modalidades"])
        ->setTamanhoQuadra(tamanho_quadra: $data["tamanho_quadra"])
        ->setQuantMinJogadores(quant_min_jogadores: $data["quant_min_jogadores"])
        ->setHorariosFunc(horarios_func: $data["horarios_func"])
        ->setValorAluguel(valor_aluguel: $data["valor_aluguel"])
        ->setDescricao(descricao: $data["descricao"]);

        $courtDAO = new CourtDAO();
        $courtDAO->create(court: $newQuadra);
    }
}
