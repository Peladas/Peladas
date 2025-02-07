<?php

namespace App\Models;

use App\Dao\EnderecoDAO;
use App\Dao\HorarioLocadorDAO;

class Locador extends Model {
    /*public $nome_fantasia;
    public $razao_socsial;
    public $cnpj;*/

    protected ?int $id;
    protected ?String $nome_fantasia;
    protected ?String $razao_social;
    protected ?String $cnpj;
    protected bool $cadastro_completo;

    protected ?int $usuario_id;



    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;

        return $this;
    }

    public function getNomeFantasia(): ?String {
        return $this->nome_fantasia;
    }

    public function setNomeFantasia(?String $nome_fantasia): self {
        $this->nome_fantasia = $nome_fantasia;

        return $this;
    }

    public function getRazaoSocial(): ?String {
        return $this->razao_social;
    }

    public function setRazaoSocial(?String $razao_social): self {
        $this->razao_social = $razao_social;

        return $this;
    }

    public function getCnpj(): ?String {
        return $this->cnpj;
    }

    public function setCnpj(?String $cnpj): ?String {
        $this->cnpj = $cnpj;

        return $this->cnpj;
    }

    public function getUsuarioId(): ?int
    {
        return $this->usuario_id;
    }

    public function setUsuarioId(?int $usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of cadastro_completo
     */
    public function isCadastroCompleto(): bool
    {
        return $this->cadastro_completo;
    }

    /**
     * Set the value of cadastro_completo
     */
    public function setCadastroCompleto(bool $cadastro_completo): self
    {
        $this->cadastro_completo = $cadastro_completo;

        return $this;
    }

    public function checarCadastroCompleto() {
        //endereco
        $enderecoDAO = new EnderecoDAO();
        $endereco = $enderecoDAO->first(['locador_id' => $this->id]);
        if (!$endereco) {
            return false;
        }

        //horario
        $horarioLocadorDAO = new HorarioLocadorDAO();
        $horarios = $horarioLocadorDAO->getAll(['locador_id' => $this->id]);
        if (!count($horarios)) {
            return false;
        }

        return true;
    }
}
