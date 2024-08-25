<?php

namespace App\Dao;

use App\Helpers\Config;
use App\Helpers\Log;
use PDO;
use PDOException;
use PDOStatement;

class BaseDAO
{
    protected readonly PDO $connection;

    /**@var string */
    protected $tableName = '';

    /**@var string */
    protected $modelName = '';

    public function __construct()
    {
        $db = Config::getSection('db');
        try {
            $host = $db['db_host'];
            $dbname = $db['db_name'];
            $user = $db['db_user'];
            $pass = $db['db_pass'];
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;
            $this->connection = new PDO($dsn, $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            Log::info('Connected to database ' . $dbname);
        } catch (PDOException $th) {
            Log::error('Connection failed: ' . $th->getMessage());
            throw $th;
        }
    }

    public function getAll(array $filters = []): array
    {
        try {
            $query = 'SELECT * FROM ' . $this->getTableName();
            if (count($filters) > 0) {
                $wheres = [];
                foreach ($filters as $key => $value) {
                    switch ($value) {
                        case 'NULL':
                            $wheres[] = "WHERE $key IS NULL";
                            break;
                        case 'NOT NULL':
                            $wheres[] = "WHERE $key IS NOT NULL";
                            break;
                        default:
                            $wheres[] = "WHERE $key='$value'";
                            break;
                    }
                }
                $query .= ' ' . implode(' AND ', $wheres);
            }
            $statement = $this->prepareConsultation($query);
            return $statement->fetchAll(PDO::FETCH_CLASS, $this->getModelName());
        } catch (\PDOException $th) {
            // 1- Escrever no log
            Log::error($th->getMessage());
            // 2- Lançar um erro personalizado (tipo um PDOException)
            throw $th;
        }
    }

    public function find(string|int $id): mixed
    {
        try {
            $statement = $this->prepareConsultation('SELECT * FROM ' . $this->getTableName() . ' WHERE id=' . $id);
            $statement->setFetchMode(PDO::FETCH_CLASS, $this->getModelName());
            return $statement->fetch();
        } catch (\Throwable $th) {
            // 1- Escrever no log
            Log::error($th->getMessage());
            // 2- Lançar um erro personalizado (tipo um PDOException)
            throw $th;
        }
    }

    public function create(array $data)
    {
        try {
            $columns = implode(',', array_keys($data));
            $values = implode(',', array_map(function ($value) {
                return "'$value'";
            }, array_values($data)));

            $query = 'INSERT INTO ' . $this->getTableName() . ' (' . $columns . ') VALUES (' . $values . ')';
            return $this->prepareConsultation($query);
        } catch (\PDOException $th) {
            // 1- Escrever no log
            Log::error($th->getMessage());
            // 2- Lançar um erro personalizado (tipo um PDOException)
            throw $th;
        }
    }

    public function update(string|int $id, array $data)
    {
        try {
            $values = [];
            foreach ($data as $key => $value) {
                $values[] = "$key='$value'";
            }
            $strValues = implode(', ', $values);
            $query = 'UPDATE ' . $this->getTableName() . ' SET ' . $strValues . ' WHERE id=' . $id;
            return $this->prepareConsultation($query);
        } catch (\Throwable $th) {
            // 1- Escrever no log
            Log::error($th->getMessage());
            // 2- Lançar um erro personalizado (tipo um PDOException)
            throw $th;
        }
    }

    /**
     * Elimina uma entidade
     * @param string|int $id Identificação da entidade
     * @return PDOStatement
     */
    public function delete($id)
    {
        try {
            $query = 'DELETE FROM ' . $this->getTableName() . ' WHERE id=' . $id;
            return $this->prepareConsultation($query);
        } catch (\Throwable $th) {
            // 1- Escrever no log
            Log::error($th->getMessage());
            // 2- Lançar um erro personalizado (tipo um PDOException)
            throw $th;
        }
    }

    protected function getTableName(): string
    {
        if (!$this->tableName)  throw new PDOException('Nome da tabela não definido');
        return $this->tableName;
    }

    protected function getModelName(): string
    {
        if (!$this->modelName) throw new PDOException('Nome do modelo não definido');
        return $this->modelName;
    }

    protected function prepareConsultation(string $query): PDOStatement
    {
        $statement = $this->connection->prepare($query);
        if (!$statement) throw new PDOException('Erro preparando a consulta');
        if (!$statement->execute()) throw new PDOException('Erro executando a consulta');
        return $statement;
    }
}
