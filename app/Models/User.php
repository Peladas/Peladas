<?php

namespace App\Models;

class User {
    /*public $tipo_usuario;
    public $email;
    public $telefone;
    public $endereco;
    public $senha;
    public $situacao;*/

    private ?int $id;
    private ?String $tipo_usuario;
    private ?String $email;
    private ?String $telefone;
    private ?String $endereco;
    private ?String $senha;
    private ?String $situacao;


    public function getId(): ?int {
        return $this->id;
    }

    public function setId(?int $id): self {
        $this->id = $id;

        return $this;
    }

    public function getTipoUsuario(): ?String {
        return $this->tipo_usuario;
    }

    public function setTipoUsuario(?String $tipo_usuario): self {
        $this->tipo_usuario = $tipo_usuario;

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

    public function getEndereco(): ?String {
        return $this->endereco;
    }

    public function setEndereco(?String $endereco): self {
        $this->endereco = $endereco;

        return $this;
    }

    public function getSenha(): ?String {
        return $this->senha;
    }

    public function setSenha(?String $senha): self {
        $this->senha = $senha;

        return $this;
    }

    public function getSituacao(): ?String {
        return $this->situacao;
    }

    public function setSituacao(?String $situacao): self {
        $this->situacao = $situacao;

        return $this;
    }
}
