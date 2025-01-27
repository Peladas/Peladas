<?php

namespace App\Models;

class Quadra extends Model {

    protected ?int $id;
    protected ?Float $valor_aluguel;
    protected ?int $quant_max_jogadores;
    protected ?String $tamanho_quadra;
    protected ?String $identificador;
    protected ?String $modalidade;
    protected ?String $descricao;
    protected ?int $status;

    protected ?int $locador_id;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
    public function getValorAluguel(): ?Float
    {
        return $this->valor_aluguel;
    }

    public function setValorAluguel(?Float $valor_aluguel): self
    {
        $this->valor_aluguel = $valor_aluguel;

        return $this;
    }

    public function getQuantMaxJogadores(): ?int
    {
        return $this->quant_max_jogadores;
    }

    public function setQuantMaxJogadores(?int $quant_max_jogadores): self
    {
        $this->quant_max_jogadores = $quant_max_jogadores;

        return $this;
    }

    public function getTamanhoQuadra(): ?String
    {
        return $this->tamanho_quadra;
    }

    public function setTamanhoQuadra(?String $tamanho_quadra): self
    {
        $this->tamanho_quadra = $tamanho_quadra;

        return $this;
    }

    public function getIdentificador(): ?String
    {
        return $this->identificador;
    }

    public function setIdentificador(?String $identificador): self
    {
        $this->identificador = $identificador;

        return $this;
    }

    public function getModalidade(): ?String
    {
        return $this->modalidade;
    }

    public function setModalidade(?String $modalidade): self
    {
        $this->modalidade = $modalidade;

        return $this;
    }


    public function getDescricao(): ?String
    {
        return $this->descricao;
    }

    public function setDescricao(?String $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }
    public function getStatus(): ?int
    {
        return $this->status;
    }

    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLocadorId(): ?int
    {
        return $this->locador_id;
    }

    public function setLocadorId(?int $locador_id): self
    {
        $this->locador_id = $locador_id;

        return $this;
    }
}
