<?php

namespace App\Dao;

use App\Models\Quadra;

class CourtDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'quadras';

    /**@var string */
    protected $modelName = Quadra::class;

}
