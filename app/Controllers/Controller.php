<?php

namespace App\Controllers;

class Controller {
    protected bool $is_logged;

    public function __construct() {
        $this->setIsLogged();
    }

    protected function getSearchParam(string $param) {
        $param = isset($_REQUEST[$param]) ? $_REQUEST[$param] : null;
        return $param;
    }

    protected function getBody() {
        $body = $_POST;
        return $body;
    }

    protected function getMethod() {
        $method = $_SERVER['REQUEST_METHOD'];
        return strtolower($method);
    }

    protected function render(string $view, array $data = []) {
        //print_r("catch");die;
        $is_logged = $this->is_logged;
        // array_push($data, )
        extract($data);
        include __DIR__ .'/../views/main.php';
    }

    protected function setIsLogged() {
        $this->is_logged = false;
    }
}
