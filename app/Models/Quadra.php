<?php

namespace App\Models;

class Quadra extends Model {

    protected ?int $id;
    protected ?Float $valor_aluguel;
    protected ?int $quant_min_jogadores;
    protected ?String $tamanho_quadra;
    protected ?String $horarios_funcionamento;
    protected ?String $identificador;
    protected ?String $modalidade;
    protected ?String $descricao;

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

    public function getHorariosFuncionamento(): ?String
    {
        return $this->horarios_funcionamento;
    }

    public function setHorariosFuncionamento(?String $horarios_funcionamento): self
    {
        $this->horarios_funcionamento = $horarios_funcionamento;

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
