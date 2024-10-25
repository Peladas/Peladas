<?php

namespace App\Services\DisponibilidadeServices;

use App\Dao\DisponibilidadeDAO;

class BaseDisponibilidadeService {
    protected static function getDisponibilidade(int $id) {
        $dispoDAO = new DisponibilidadeDAO();

        $disponibilidade = $dispoDAO->find($id);

        return $disponibilidade;
    }
}
