<?php

namespace App\Dao;

use App\Models\PartidaPublica;

class PartidaPublicaDAO extends BaseDAO {
    /**@var string */
    protected $tableName = 'partidas_publicas';

    /**@var string */
    protected $modelName = PartidaPublica::class;

    public function create(PartidaPublica $partidaPublica): string {
        $partidaData = $partidaPublica->toArray();
        return $this->persist($partidaData);
    }
}
