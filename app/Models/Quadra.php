<?php

namespace App\Models;

class Quadra {

    private ?Float $valor_aluguel;
    private ?int $quant_min_jogadores;
    private ?String $tamanho_quadra;
    private ?String $horarios_func;
    private ?String $identificador;
    private ?String $modalidades;
    private ?String $descricao;


    public function getValorAluguel(): ?Float
    {
        return $this->valor_aluguel;
    }

    public function setValorAluguel(?Float $valor_aluguel): self
    {
        $this->valor_aluguel = $valor_aluguel;

        return $this;
    }

    public function getQuantMinJogadores(): ?int
    {
        return $this->quant_min_jogadores;
    }

    public function setQuantMinJogadores(?int $quant_min_jogadores): self
    {
        $this->quant_min_jogadores = $quant_min_jogadores;

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

    public function getHorariosFunc(): ?String
    {
        return $this->horarios_func;
    }

    public function setHorariosFunc(?String $horarios_func): self
    {
        $this->horarios_func = $horarios_func;

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

    public function getModalidades(): ?String
    {
        return $this->modalidades;
    }

    public function setModalidades(?String $modalidades): self
    {
        $this->modalidades = $modalidades;

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
}
