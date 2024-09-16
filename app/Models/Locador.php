<?php

namespace App\Models;

class Locador extends User {
    /*public $nome_fantasia;
    public $razao_social;
    public $cnpj;*/

    private ?int $id;
    private ?String $nome_fantasia;
    private ?String $razao_social;
    private ?String $cnpj;


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

    public function setTelefone(?String $cnpj): self {
        $this->cnpj = $cnpj;

        return $this;
    }

}
