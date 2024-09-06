<?php

namespace App\Dao;

use App\Models\Locador;

class LocadorDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'locadores';

    /**@var string */
    protected $modelName = Locador::class;

}
