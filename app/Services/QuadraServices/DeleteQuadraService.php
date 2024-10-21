<?php
namespace App\Services\QuadraServices;

use App\Dao\QuadraDAO;
use App\Enums\QuadrasStatusEnum;
use App\Traits\LocadorTrait;

class DeleteQuadraService extends BaseQuadraService {
    use LocadorTrait;

    public function __construct() {
        $this->checkLocador();
    }

    public function run(int $id, int $locadorId) {
        $showQuadraService = new ShowQuadraService();
        $showQuadraService->run($id, $locadorId);

        $this->deleteQuadra($id);
    }

    private function deleteQuadra(int $id) {
        $quadraDAO = new QuadraDAO();
        $data = ['status' => QuadrasStatusEnum::DELETED];
        $quadraDAO->update($id, $data);  // Chama o método para deletar a quadra no banco de dados
    }
}