<?php

namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Exceptions\UnauthorizedException;

class ShowQuadraService {
    public function run(int $id, int $locadorId) {
        $quadraDAO = new QuadraDAO();
        $quadra = $quadraDAO->find($id);

        if ($quadra->getLocadorId() !== $locadorId) {
            throw new UnauthorizedException('Você não pode visualizar as informações dessa quadra');
        }

        return $quadra;
    }
}
