<?php

namespace App\Controllers;

class BaseController
{
    protected function render(string $view, array $data = [])
    {
        extract($data);
        include __DIR__ .'/../Views/layout.php';
    }

    protected function getParam(string $param)
    {
        $param = isset($_REQUEST[$param]) ? $_REQUEST[$param] : null;
        return $param;
    }

    protected function getBody()
    {
        // $body = file_get_contents('php://input');
        $body = $_POST;
        // return json_decode($body, true);
        return $body;
    }
}
