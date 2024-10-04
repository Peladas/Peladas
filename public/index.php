<?php

use App\Controllers\Controller;
use App\Exceptions\UnauthenticatedException;
use App\Exceptions\UnauthorizedException;

require '../vendor/autoload.php';

session_start();

set_exception_handler(function (Throwable $ex) {
    $controller = new Controller();
    $message = $ex->getMessage();

    if ($ex instanceof UnauthenticatedException) {
        $controller->render('401', ['message' => $message]);
        return;
    }

    if ($ex instanceof UnauthorizedException) {
        $controller->render('403', ['message' => $message]);
        return;
    }

    $controller->render('exception', ['message' => $message]);
});

require_once __DIR__ . '/../app/Router/Router.php';
