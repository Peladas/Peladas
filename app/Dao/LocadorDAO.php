<?php

namespace App\Dao;

use App\Models\Locador;

class LocadorDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'locadores';

    /**@var string */
    protected $modelName = Locador::class;

    public function create(Locador $locador): string {
        $locadorData = $locador->toArray();
        return $this->persist($locadorData);
    }

    public function getByUsuarioId(int $usuarioId) {
        return $this->first(['usuario_id' => $usuarioId]);
    }

}
