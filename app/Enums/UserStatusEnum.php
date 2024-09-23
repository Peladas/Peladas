<?php

namespace App\Enums;

final class UserStatusEnum {
    const PENDING = 0;
    const ACTIVE = 1;
    const INACTIVE = 2;
    const DELETED = 3;

    public function getName(string $value): string {
        return match ($value) {
            self::PENDING => 'Pendente',
            self::ACTIVE => 'Ativo',
            self::INACTIVE => 'Inativo',
            self::DELETED => 'Excluído',
            default => '',
        };
    }
}
