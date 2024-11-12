<?php

namespace App\Services\DisponibilidadeServices;

use App\Dao\QuadraDAO;
use App\Exceptions\UnauthorizedException;

class EditDisponibilidadeService {
    public function run(int $quadraId, int $locadorId): array {
        $quadraDAO = new QuadraDAO();
        $quadra = $quadraDAO->find($quadraId);

        //checar se a quadra pertence ao locador
        if($quadra->getLocadorId() !== $locadorId) {
            throw new UnauthorizedException("Você não possui acesso a essa quadra!");
        }
    }
}
