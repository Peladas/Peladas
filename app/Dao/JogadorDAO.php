<?php

namespace App\Dao;

use App\Models\Jogador;

class JogadorDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'jogadores';

    /**@var string */
    protected $modelName = Jogador::class;

    public function create(Jogador $jogador): string {
        $jogadorData = $jogador->toArray();

        return $this->persist($jogadorData);
    }

}
