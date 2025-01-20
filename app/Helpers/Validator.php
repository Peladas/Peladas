<?php

namespace App\Helpers;

final class Validator {
    public static function notEmpty(mixed $value): bool {
        return !empty($value);
    }

    public static function email(string $email): bool {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function password(string $password): bool {
        // A senha deve conter:
        // - Pelo menos uma letra maiúscula (A-Z)
        // - Pelo menos uma letra minúscula (a-z)
        // - Pelo menos um número (0-9)
        // - Pelo menos um caractere especial (!@#$%^&*() etc.)
        // - Pelo menos 8 caracteres de comprimento

        $hasUpperCase = preg_match('/[A-Z]/', $password);     // Letra maiúscula
        $hasLowerCase = preg_match('/[a-z]/', $password);     // Letra minúscula
        $hasNumber = preg_match('/\d/', $password);           // Número
        $hasSpecialChar = preg_match('/[\W_]/', $password);   // Caractere especial

        return $hasUpperCase && $hasLowerCase && $hasNumber && $hasSpecialChar;
    }

    public static function passwordMatch(string $inputPassword, string $hashedPassword): bool {
        return password_verify($inputPassword, $hashedPassword);
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

    public static function minAge(string $birthdate, int $minAge = 16): bool {
        $birthDate = new \DateTime(datetime: $birthdate);
        $today = new \DateTime();

        $age = $today->diff($birthDate)->y;

        return $age >= $minAge;
    }

}
