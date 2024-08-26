<?php

namespace App\Helpers;

final class Validator {
    public static function notEmpty(mixed $value): bool {
        return !empty($value);
    }

    public static function email(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function stringMin(string $value, int $length): bool {
         return mb_strlen($value) >= $length;
    }

    public static function stringMax(string $value, int $length): bool {
        return mb_strlen($value) <= $length;
    }

    public static function same(mixed $value1, mixed $value2): bool {
        return $value1 === $value2;
    }

    public static function phone(string $value): bool {
        $cleaned = preg_replace('/\D+/', '', $value);
        $length = strlen($cleaned);
        return $length === 10 || $length === 11;
    }

    public static function cpf(string $value): bool {
        return Document::validateCpf($value);
    }

    public static function cnpj(string $value): bool {
        return Document::validateCnpj($value);
    }

    public static function validateDocument(string $value): bool {
        return Document::documentIsValid($value);
    }
}
