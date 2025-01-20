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

    public static function formatCPF($cpf): string {
        // Remove qualquer caractere não numérico
        $cpfNumber = preg_replace('/\D+/', '', $cpf);

        // Verifica se o CPF tem 11 dígitos
        if (strlen($cpfNumber) == 11) {
            // Aplica o formato ###.###.###-##
            return preg_replace("/^(\d{3})(\d{3})(\d{3})(\d{2})$/", "$1.$2.$3-$4", $cpfNumber);
        }

        // Retorna o CPF original caso não tenha 11 dígitos
        return $cpf;
    }

    public static function formatBirthDate(string $date): string {
        // Verifica se a data está no formato esperado (YYYY-MM-DD)
        if (preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
            // Converte a data para o formato DD/MM/YYYY
            $dateParts = explode('-', $date);
            return "{$dateParts[2]}/{$dateParts[1]}/{$dateParts[0]}";
        }

        // Retorna a data original caso não esteja no formato esperado
        return $date;
    }


}
