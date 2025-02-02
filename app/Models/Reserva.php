<?php

namespace App\Models;

use App\Dao\PartidaPublicaDAO;
use App\Dao\QuadraDAO;

class Reserva extends Model {

    protected ?int $id;
    protected ?string $tipo_reserva;
    protected ?string $data_reserva;
    protected ?string $horario_reservado;
    protected ?string $quantidade_jogadores;
    protected ?int $status;

    protected ?int $jogador_id;
    protected ?int $quadra_id;

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

    public function getDataReserva(): ?string
    {
        return $this->data_reserva;
    }

    /**
     * Set the value of horario_reservado
     */
    public function setDataReserva(?string $data_reserva): self
    {
        $this->data_reserva = $data_reserva;

        return $this;
    }
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

    /**
     * Get the value of quadra_id
     */
    public function getQuadraId(): ?int
    {
        return $this->quadra_id;
    }

    /**
     * Set the value of quadra_id
     */
    public function setQuadraId(?int $quadra_id): self
    {
        $this->quadra_id = $quadra_id;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(?int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getQuadra(): mixed {
        $quadraDAO = new QuadraDAO();
        $quadra = $quadraDAO->find($this->quadra_id);
        return $quadra;
    }

    public function getJogadoresInscritos(): array {
        $partidaPublicaDAO = new PartidaPublicaDAO();
        $partidaPublica = $partidaPublicaDAO->getAll(['reserva_id' => $this->id]);
        return $partidaPublica;
    }
}
