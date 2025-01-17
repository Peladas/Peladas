<?php

namespace App\Helpers;

final class Formatter {
    public static function formatCurrency(float $value): string {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public static function formatPhoneNumber($phone) {
        $phoneNumber = preg_replace('/\D+/', '', $phone);

        if (strlen($phoneNumber) == 10) {
            $formattedNumber = preg_replace("/^(\d{2})(\d{4})(\d{4})$/", "($1) $2-$3", $phoneNumber);
        } else if (strlen($phoneNumber) == 11) {
            $formattedNumber = preg_replace("/^(\d{2})(\d{5})(\d{4})$/", "($1) $2-$3", $phoneNumber);
        } else {
            $formattedNumber = $phone;
        }

        return $formattedNumber;
    }

    public static function formatCEP($cep) {
        $cepNumber = preg_replace('/\D+/', '', $cep);

        if (strlen($cepNumber) == 8) {
            $formattedNumber = preg_replace("/^(\d{5})(\d{3})$/", "$1-$2", $cepNumber);
        } else {
            $formattedNumber = $cep;
        }

        return $formattedNumber;
    }

    public static function valueReais(float $reais): string {
        return 'R$ ' . number_format($reais, 2, ',', '.');
    }
}
