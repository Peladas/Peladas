<?php

namespace App\Exceptions;

class UnauthorizedException extends \Exception {
    public function __construct($message = 'Não autorizado') {
        $code = 403;
        parent::__construct( $message, $code );
    }
}
