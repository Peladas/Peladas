<?php

namespace App\Enums;

final class QuadrasStatusEnum {
    const ACTIVE = 1;
    const INACTIVE = 2;
    const DELETED = 3;

    public function getName(string $value): string {
        return match ($value) {
            self::ACTIVE => 'Ativa',
            self::INACTIVE => 'Inativa',
            self::DELETED => 'Excluída',
            default => '',
        };
    }
}
