<?php

namespace App\Dao;

use App\Models\Quadra;

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

}
