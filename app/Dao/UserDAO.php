<?php

namespace App\Dao;

use App\Models\User;

class UserDAO extends BaseDAO
{
    /**@var string */
    protected $tableName = 'usuarios';

    /**@var string */
    protected $modelName = User::class;

}
