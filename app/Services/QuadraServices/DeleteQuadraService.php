<?php

namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Dao\LocadorDAO;
use App\Helpers\Validator;
use App\Models\Locador;
use App\Models\Quadra;
use App\Traits\LocadorTrait;

class DeleteQuadraService {
    use LocadorTrait;

    public function __construct() {
        $this->checkLocador();
    }

    public function run(int $id) {
        $quadraDAO = new QuadraDAO();
        $this->deleteQuadra(id: $id);
    }

    private function deleteQuadra(int $id) {
        $quadraDAO = new QuadraDAO();
        $quadraDAO->delete($id);
    }

    public static function getQuadra(int $id) {
        $quadraDAO = new QuadraDAO();

        $quadra = $quadraDAO->find($id);

        return $quadra;
    }
}
