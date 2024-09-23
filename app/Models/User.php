<?php

namespace App\Models;

class User extends Model {
    protected ?int $id;
    protected ?String $email;
    protected ?String $telefone;
    protected ?String $senha;
    protected ?String $ativo;


    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;

        return $this;
    }

    public function getEmail(): ?String {
        return $this->email;
    }

    public function setEmail(?String $email): self {
        $this->email = $email;

        return $this;
    }

    public function getTelefone(): ?String {
        return $this->telefone;
    }

    public function setTelefone(?String $telefone): self {
        $this->telefone = $telefone;

        return $this;
    }

    public function getSenha(): ?String {
        return $this->senha;
    }

    public function setSenha(?String $senha): self {
        $this->senha = $senha;

        return $this;
    }

    public function getAtivo(): ?String {
        return $this->ativo;
    }

    public function setAtivo(?String $ativo): self {
        $this->ativo = $ativo;

        return $this;
    }
}
