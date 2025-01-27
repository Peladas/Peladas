<?php

namespace App\Dao;

use App\Models\Reserva;

class ReservaDAO extends BaseDAO {
    protected $tableName = 'reservas';
    protected $modelName = Reserva::class;

    public function getReservas(array $filters = []): array {
        return $this->getAll($filters);
    }

     public function create(Reserva $reserva): string {
        $reservaData = $reserva->toArray();
        return $this->persist($reservaData);
    }

    public function getByJogadorId(int $jogadorId): array {
        return $this->getAll(['jogador_id' => $jogadorId]);
    }

    public function getByQuadraId(int $quadraId): array {
        return $this->getAll(['quadra_id' => $quadraId]);
    }
}
