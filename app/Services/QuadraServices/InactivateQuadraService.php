<?php
namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Enums\QuadrasStatusEnum;
use App\Traits\LocadorTrait;

class InactivateQuadraService extends BaseQuadraService {
    use LocadorTrait;

    public function __construct() {
        $this->checkLocador();
    }

    public function run(int $id, int $locadorId) {
        $showQuadraService = new ShowQuadraService();
        $showQuadraService->run($id, $locadorId);

        $this->inactivateQuadra($id);
    }

    private function inactivateQuadra(int $id) {
        $quadraDAO = new QuadraDAO();
        $data = ['status' => QuadrasStatusEnum::INACTIVE];
        $quadraDAO->update($id, $data);  // Chama o método para deletar a quadra no banco de dados
    }
}
