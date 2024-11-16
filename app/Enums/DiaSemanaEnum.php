<?php

namespace App\Enums;

final class DiaSemanaEnum
{
    const SEGUNDA = 1;
    const TERCA = 2;
    const QUARTA = 3;
    const QUINTA = 4;
    const SEXTA = 5;
    const SABADO = 6;
    const DOMINGO = 7;

    public static function getName(int $value): string {
        $dayName = match ($value) {
            self::SEGUNDA => 'Segunda-feira',
            self::TERCA => 'Terça-feira',
            self::QUARTA => 'Quarta-feira',
            self::QUINTA => 'Quinta-feira',
            self::SEXTA => 'Sexta-feira',
            self::SABADO => 'sábado',
            self::DOMINGO => 'domingo',
            default => null,
        };

        if (!$dayName) throw new \Exception('Dia da semana incorreto');

        return $dayName;
    }
}
