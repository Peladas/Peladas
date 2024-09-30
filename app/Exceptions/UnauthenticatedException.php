<?php

namespace App\Exceptions;

class UnauthenticatedException extends \Exception {
    public function __construct() {
        $message = 'Não autenticado';
        $code = 401;
        parent::__construct( $message, $code );
    }
}
