<?php

namespace App\Services\DisponibilidadeServices;

use App\Dao\DisponibilidadeDAO;
use App\Exceptions\UnauthorizedException;

class ShowDisponibilidadeService {
    public function run(int $id, int $locadorId) {
        $dispoDao = new DisponibilidadeDAO();
        $disponibilidade = $dispoDao->find($id);

        if ($disponibilidade->getLocadorId() !== $locadorId) {
            throw new UnauthorizedException('Você não pode visualizar as informações dessa quadra');
        }

        return $disponibilidade;
    }
}
