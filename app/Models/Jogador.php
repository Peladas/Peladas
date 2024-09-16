<?php

namespace App\Models;

class Jogador extends User {

    private ?int $id;
    private ?String $nomeJogador;
    private ?String $cpf;
    private ?String $dataNascimento; //Ver se tem que ser DATE
    private ?String $apelido;


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
        return $this->nomeJogador;
    }

    /**
     * Set the value of nomeJogador
     */
    public function setNomeJogador(?String $nomeJogador): self
    {
        $this->nomeJogador = $nomeJogador;

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
        return $this->dataNascimento;
    }

    /**
     * Set the value of dataNascimento
     */
    public function setDataNascimento(?String $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;

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
}
