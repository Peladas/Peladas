<?php

namespace App\Exceptions;

const MESSAGE = 'Foi encontrado um acesso irregular. Por favor utilize a navegação do site';

class MethodNotAllowedException extends \Exception {
    public function __construct($message = MESSAGE) {
        $code = 404;
        parent::__construct( $message, $code );
    }
}

