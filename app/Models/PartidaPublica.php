<?php

namespace App\Models;

use App\Dao\JogadorDAO;

class PartidaPublica extends Model {
    protected ?int $id;
    protected ?int $jogador_id;
    protected ?String $reserva_id;

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
     * Get the value of reserva_id
     */
    public function getReservaId(): ?String
    {
        return $this->reserva_id;
    }

    /**
     * Set the value of reserva_id
     */
    public function setReservaId(?String $reserva_id): self
    {
        $this->reserva_id = $reserva_id;

        return $this;
    }

    public function getJogador(): Jogador {
        $jogadorDAO = new JogadorDAO();
        return $jogadorDAO->find($this->jogador_id);
    }
}
