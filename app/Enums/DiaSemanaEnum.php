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
            self::SEGUNDA => 'segunda',
            self::TERCA => 'terça',
            self::QUARTA => 'quarta',
            self::QUINTA => 'quinta',
            self::SEXTA => 'sexta',
            self::SABADO => 'sábado',
            self::DOMINGO => 'domingo',
            default => null,
        };

        if (!$dayName) throw new \Exception('Dia da semana incorreto');

        return $dayName;
    }
}
