<?php

namespace App\Dao;

use App\Models\Reserva;

class ReservaDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'reservas';

    /**@var string */
    protected $modelName = Reserva::class;

    public function create(Reserva $reserva) {
        $reservaData = $reserva->toArray();
        return $this->persist($reservaData);
    }

}
