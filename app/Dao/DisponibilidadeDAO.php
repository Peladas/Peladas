<?php

namespace App\Dao;

use App\Models\Disponibilidade;
use App\Helpers\Log;


class DisponibilidadeDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'disponibilidades';

    /**@var string */
    protected $modelName = Disponibilidade::class;

    public function create(Disponibilidade $disponibilidade): string {
        $dispoData = $disponibilidade->toArray();
        return $this->persist($dispoData);
    }

    public function delete($id) {
        try {
            $query = 'DELETE FROM ' . $this->getTableName() . ' WHERE id=' . $id;
            return $this->prepareConsultation($query);
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            throw $th;
        }
    }
}
