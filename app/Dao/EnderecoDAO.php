<?php

namespace App\Dao;

use App\Models\Endereco;

class EnderecoDAO extends BaseDAO {

    protected $tableName = 'endereco';

    protected $modelName = Endereco::class;

    public function create(Endereco $endereco): string {
        $enderecoData = $endereco->toArray();
        return $this->persist($enderecoData);
    }
}

?>
