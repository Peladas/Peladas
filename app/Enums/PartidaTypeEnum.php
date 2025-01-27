<?php

namespace App\Enums;

final class PartidaTypeEnum {
    const PRIVADA = 1;
    const PUBLICA = 2;

    public static function getName(int $value): string {
        $typePartida = match ($value) {
            self::PRIVADA => 'Privada',
            self::PUBLICA => 'Pública',
            default => null,
        };

        if (!$typePartida) throw new \Exception('Tipo de partida incorreto');

        return $typePartida;
    }
}
