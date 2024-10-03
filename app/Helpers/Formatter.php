<?php

namespace App\Helpers;

final class Formatter {
    public static function formatCurrency(float $value): string {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }
}
