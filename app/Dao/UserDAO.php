<?php

namespace App\Dao;

use App\Models\User;

class UserDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'usuarios';

    /**@var string */
    protected $modelName = User::class;

    public int $id;
    public string $email;
    public string $telefone;
    public string $senha;
    public string $ativo;

    public function create(User $user): string {
        $userData = $user->toArray();
        return $this->persist($userData);
    }
}
