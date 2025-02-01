<?php
namespace App\Services\ReservaServices;

use App\Dao\ReservaDAO;
use App\Enums\ReservaStatusEnum;
use App\Models\Reserva;

class CancelReservaService {

    public function run(int $id) {

        $this->cancelReserva($id);
    }

    private function cancelReserva(int $id) {
        $reservaDAO = new ReservaDAO();
        $data = ['status' => ReservaStatusEnum::CANCELED];
        $reservaDAO->update($id, $data);
    }
}
