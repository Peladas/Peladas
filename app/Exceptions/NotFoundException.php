<?php

namespace App\Exceptions;

class NotFoundException extends \Exception {
    public function __construct($message = 'Entidade não encontrada') {
        $code = 404;
        parent::__construct( $message, $code );
    }
}
