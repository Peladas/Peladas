<?php

namespace App\Models;

class HorarioLocador extends Model {
    protected ?int $id;
    protected ?int $dia_semana;
    protected ?String $hora_inicio;
    protected ?String $hora_fim;

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
     * Get the value of dia_semana
     */
    public function getDiaSemana(): ?int
    {
        return $this->dia_semana;
    }

    /**
     * Set the value of dia_semana
     */
    public function setDiaSemana(?int $dia_semana): self
    {
        $this->dia_semana = $dia_semana;

        return $this;
    }

    /**
     * Get the value of hora_inicio
     */
    public function getHoraInicio(): ?String
    {
        return $this->hora_inicio;
    }

    /**
     * Set the value of hora_inicio
     */
    public function setHoraInicio(?String $hora_inicio): self
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    /**
     * Get the value of hora_fim
     */
    public function getHoraFim(): ?String
    {
        return $this->hora_fim;
    }

    /**
     * Set the value of hora_fim
     */
    public function setHoraFim(?String $hora_fim): self
    {
        $this->hora_fim = $hora_fim;

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
