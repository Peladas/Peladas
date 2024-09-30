<?php

namespace App\Models;

class Jogador extends User {

    protected ?int $id;
    protected ?String $nome_jogador;
    protected ?String $cpf;
    protected ?String $data_nascimento; //Ver se tem que ser DATE
    protected ?String $apelido;

    protected ?int $usuario_id;


    /**
     * Get the value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nomeJogador
     */
    public function getNomeJogador(): ?String
    {
        return $this->nome_jogador;
    }

    /**
     * Set the value of nomeJogador
     */
    public function setNomeJogador(?String $nome_jogador): self
    {
        $this->nome_jogador = $nome_jogador;

        return $this;
    }

    /**
     * Get the value of cpf
     */
    public function getCpf(): ?String
    {
        return $this->cpf;
    }

    /**
     * Set the value of cpf
     */
    public function setCpf(?String $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    /**
     * Get the value of dataNascimento
     */
    public function getDataNascimento(): ?String
    {
        return $this->data_nascimento;
    }

    /**
     * Set the value of data_nascimento
     */
    public function setDataNascimento(?String $data_nascimento): self
    {
        $this->data_nascimento = $data_nascimento;

        return $this;
    }

    /**
     * Get the value of apelido
     */
    public function getApelido(): ?String
    {
        return $this->apelido;
    }

    /**
     * Set the value of apelido
     */
    public function setApelido(?String $apelido): self
    {
        $this->apelido = $apelido;

        return $this;
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuarioId(): ?int
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     */
    public function setUsuarioId(?int $usuario_id): self
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }
}
