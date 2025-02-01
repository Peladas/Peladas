<?php

namespace App\Enums;

final class ReservaStatusEnum {
    const PENDING = 1;
    const COMPLETED = 2;
    const CANCELED = 3;

    public static function getName(string $value): string {
        $status = match ($value) {
            self::PENDING => 'Pendente',
            self::COMPLETED => 'Completa',
            self::CANCELED => 'Cancelada',
            default => NULL,
        };

        return $status;
    }
}
