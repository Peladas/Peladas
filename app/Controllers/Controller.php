<?php

namespace App\Controllers;

class Controller {
    protected bool $is_logged;

    public function __construct() {
        $this->setIsLogged();
    }

    protected function getSearchParam(string $param) {
        $param = $_REQUEST[$param] ?? null;
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
        $is_logged = $this->is_logged;
        extract($data);
        // var_dump('logged: ' . json_encode(['logged' => $is_logged]));
        // var_dump($_SESSION);
        include __DIR__ .'/../Views/main.php';
    }

    protected function setIsLogged(): void {
        $this->is_logged = isset($_SESSION['usuario_id']);
    }
}
