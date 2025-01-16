<?php

namespace App\Dao;

use App\Models\Reserva;
use App\Helpers\Log;
use PDOException;

class ReservaDAO extends BaseDAO {
    protected $tableName = 'reservas';
    protected $modelName = Reserva::class;

    /**
     * Retorna as reservas filtradas por jogador ou quadra.
     */
    public function getReservas(array $filters = []): array {
        return $this->getAll($filters);
    }

    /**
     * Cria uma nova reserva.
     */
    public function criarReserva(array $data): int {
        try {
            return $this->persist($data);
        } catch (PDOException $e) {
            Log::error('Erro ao criar reserva: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Busca reservas por jogador.
     */
    public function getByJogadorId(int $jogadorId): array {
        return $this->getAll(['jogador_id' => $jogadorId]);
    }

    /**
     * Busca reservas por quadra.
     */
    public function getByQuadraId(int $quadraId): array {
        return $this->getAll(['quadra_id' => $quadraId]);
    }
}
