<?php

namespace App\Models;

class Endereco extends Model {
    protected ?int $id;
    protected ?String $rua;
    protected ?int $numero;
    protected ?int $cep;
    protected ?String $estado;
    protected ?String $cidade;
    protected ?String $bairro;

    protected ?int $locador_id;

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
     * Get the value of rua
     */
    public function getRua(): ?String
    {
        return $this->rua;
    }

    /**
     * Set the value of rua
     */
    public function setRua(?String $rua): self
    {
        $this->rua = $rua;

        return $this;
    }

    /**
     * Get the value of numero
     */
    public function getNumero(): ?int
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     */
    public function setNumero(?int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * Get the value of cep
     */
    public function getCep(): ?int
    {
        return $this->cep;
    }

    /**
     * Set the value of cep
     */
    public function setCep(?int $cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado(): ?String
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     */
    public function setEstado(?String $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of cidade
     */
    public function getCidade(): ?String
    {
        return $this->cidade;
    }

    /**
     * Set the value of cidade
     */
    public function setCidade(?String $cidade): self
    {
        $this->cidade = $cidade;

        return $this;
    }

    /**
     * Get the value of bairro
     */
    public function getBairro(): ?String
    {
        return $this->bairro;
    }

    /**
     * Set the value of bairro
     */
    public function setBairro(?String $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    /**
     * Get the value of locador_id
     */
    public function getLocadorId(): ?int
    {
        return $this->locador_id;
    }

    /**
     * Set the value of locador_id
     */
    public function setLocadorId(?int $locador_id): self
    {
        $this->locador_id = $locador_id;

        return $this;
    }
}

?>
