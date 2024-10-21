<?php

namespace App\Models;

class Reserva extends Model {

    protected ?int $id;
    protected ?string $tipo_reserva;
    protected ?string $horario_reservado;
    protected ?string $quantidade_jogadores;

    protected ?int $jogador_id;

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
     * Get the value of tipo_reserva
     */
    public function getTipoReserva(): ?string
    {
        return $this->tipo_reserva;
    }

    /**
     * Set the value of tipo_reserva
     */
    public function setTipoReserva(?string $tipo_reserva): self
    {
        $this->tipo_reserva = $tipo_reserva;

        return $this;
    }

    /**
     * Get the value of horario_reservado
     */
    public function getHorarioReservado(): ?string
    {
        return $this->horario_reservado;
    }

    /**
     * Set the value of horario_reservado
     */
    public function setHorarioReservado(?string $horario_reservado): self
    {
        $this->horario_reservado = $horario_reservado;

        return $this;
    }

    /**
     * Get the value of quantidade_jogadores
     */
    public function getQuantidadeJogadores(): ?string
    {
        return $this->quantidade_jogadores;
    }

    /**
     * Set the value of quantidade_jogadores
     */
    public function setQuantidadeJogadores(?string $quantidade_jogadores): self
    {
        $this->quantidade_jogadores = $quantidade_jogadores;

        return $this;
    }

    /**
     * Get the value of jogador_id
     */
    public function getJogadorId(): ?int
    {
        return $this->jogador_id;
    }

    /**
     * Set the value of jogador_id
     */
    public function setJogadorId(?int $jogador_id): self
    {
        $this->jogador_id = $jogador_id;

        return $this;
    }
}
