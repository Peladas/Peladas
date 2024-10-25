<?php

namespace App\Models;

class Disponibilidade extends Quadra {

    protected ?int $id;
    protected ?String $horario_inicio;
    protected ?String $horario_fim;

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
     * Get the value of horario_inicio
     */
    public function getHorarioInicio(): ?String
    {
        return $this->horario_inicio;
    }

    /**
     * Set the value of horario_inicio
     */
    public function setHorarioInicio(?String $horario_inicio): self
    {
        $this->horario_inicio = $horario_inicio;

        return $this;
    }

    /**
     * Get the value of horario_fim
     */
    public function getHorarioFim(): ?String
    {
        return $this->horario_fim;
    }

    /**
     * Set the value of horario_fim
     */
    public function setHorarioFim(?String $horario_fim): self
    {
        $this->horario_fim = $horario_fim;

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
}
