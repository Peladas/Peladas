<?php

namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Helpers\Validator;
use App\Models\Quadra;
use App\Traits\LocadorTrait;

class CreateQuadraService {
    use LocadorTrait;

    public function __construct() {
        $this->checkLocador();
    }

    public function run(array $data) {
        $errors = $this->validate(data: $data);
        //var_dump($data);

        if (count(value: $errors) === 0) {
            $locadorId = $this->getLocadorId();
            $this->createQuadra(locadorId: $locadorId, data: $data);
        }
        return $errors;
    }

    private function validate (array $data) {
        $errors = [];
        if (!Validator::notEmpty(value: $data['identificador'])) {
            $errors['identificador'] = 'Obrigatório espicificar o tipo de quadra';
        }
        if (!Validator::notEmpty(value: $data['modalidade'])) {
            $errors['modalidade'] = 'Obrigatório espicificar a modalidade ';
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

    private function createQuadra(int $locadorId, array $data) {
        $newQuadra = new Quadra();
        $newQuadra->setLocadorId(locador_id: $locadorId)
            ->setIdentificador(identificador: $data["identificador"])
            ->setModalidade(modalidade: $data["modalidade"])
            ->setTamanhoQuadra(tamanho_quadra: $data["tamanho_quadra"])
            ->setQuantMinJogadores(quant_min_jogadores: $data["quant_min_jogadores"])
            ->setValorAluguel(valor_aluguel: $data["valor_aluguel"])
            ->setDescricao(descricao: $data["descricao"]);

        $quadraDAO = new QuadraDAO();
        $quadraDAO->create(quadra: $newQuadra);
    }
}
