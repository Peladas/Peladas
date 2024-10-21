<?php

namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;

class BaseQuadraService {
    protected static function getQuadra(int $id) {
        $quadraDAO = new QuadraDAO();

        $quadra = $quadraDAO->find($id);

        return $quadra;
    }
}
