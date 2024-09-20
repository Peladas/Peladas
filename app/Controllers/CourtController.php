<?php

namespace App\Controllers;

use App\Services\CourtService;

class CourtController extends Controller {

    public function quadras() {

        if ($this->getMethod() === 'get') {
            return $this->render('quadras');
        }

        return $this->render('quadras');
    }

    public function quadras_register() {
        $args = [];
        if ($this->getMethod() === 'get') {
            return $this->render('quadras');
        };

        $data = $this->getBody();

        $courtService = new CourtService();
        $errors = $courtService->run($data);

        if (count($errors) > 0) {
            return $this->render('court_register', compact('errors', 'data'));
        }

        header('Location: /');
    }
}
