<?php

namespace App\Dao;

use App\Models\Quadra;
use App\Helpers\Log;


class QuadraDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'quadras';

    /**@var string */
    protected $modelName = Quadra::class;

    public function create(Quadra $quadra): string {
        $quadraData = $quadra->toArray();
        return $this->persist($quadraData);
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
