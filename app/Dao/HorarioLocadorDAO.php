<?php

namespace App\Dao;

use App\Models\HorarioLocador;

class HorarioLocadorDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'locador_horario';

    /**@var string */
    protected $modelName = HorarioLocador::class;

    public function create(HorarioLocador $horarioLocador): string {
        $horarioData = $horarioLocador->toArray();
        return $this->persist($horarioData);
    }

}
