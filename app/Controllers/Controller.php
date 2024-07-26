<?php 

namespace App\Controllers;

class Controller {
    protected function getSearchParam(string $param) {
        $param = isset($_REQUEST[$param]) ? $_REQUEST[$param] : null;
        return $param;
    }

    protected function getBody() {
        $body = $_POST;
        return $body;
    }

    protected function render(string $view, array $data = []) {
        //print_r("catch");die;
        extract($data);
        include __DIR__ .'/../../views/layout.php';
    }
}