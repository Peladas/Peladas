<?php
namespace App\Helpers;

class Document {
    public static function validateCnpj(String $cnpj)
    {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);

        if (strlen($cnpj) != 14) {
            return false;
        }

        if (preg_match('/(\d)\1{13}/', $cnpj)) {
            return false;
        }

        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        if ($cnpj[12] != ($resto < 2 ? 0 : 11 - $resto)) {
            return false;
        }

        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $resto = $soma % 11;

        return $cnpj[13] == ($resto < 2 ? 0 : 11 - $resto);
    }

    public static function validateCpf(String $cpf)
    {
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    public static function documentIsValid(string $document)
    {
        $document = preg_replace('/\D/', '', $document);
        $documentLenght = strlen($document);

        if ($documentLenght == 11) {
            return self::validateCpf($document);
        }

        if ($documentLenght == 14) {
            return self::validateCnpj($document);
        }

        return false;
    }

    public static function getDocumentType(string $document)
    {
        $dataLenght = strlen(preg_replace('/\D/', '', $document));

        if ($dataLenght === 11 && self::validateCpf($document)) return 'cpf';
        if ($dataLenght === 14 && self::validateCnpj($document)) return 'cnpj';

        return null;
    }

    public static function formatCpf(string $document, bool $masked = false): string
    {
        $cleanedDocument = preg_replace('/\D/', '', $document);

        if (strlen($cleanedDocument) != 11) {
            return $document;
        }

        $format = $masked ? '$1.***.***-$4' : '$1.$2.$3-$4';

        return preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', $format, $cleanedDocument);
    }

    public static function formatCnpj(string $document): string
    {
        $cleanedDocument = preg_replace('/\D/', '', $document);

        if (strlen($cleanedDocument) != 14)  return $document;

        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cleanedDocument);
    }
}
