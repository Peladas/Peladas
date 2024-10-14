<?php

namespace App\Exceptions;

class UnauthorizedException extends \Exception {
    public function __construct($message = 'Acesso não autorizado') {
        $code = 403;
        parent::__construct( $message, $code );
    }
}
