<?php

namespace App\Controllers;

use App\Services\CourtService;

class CourtController extends Controller {

    public function court() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'court');
        }
    }

    public function areas_desportivas() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'areas_desportivas');
        }
    }

    public function court_register() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'court_register');
        }

        $data = $this->getBody();

        $courtService = new CourtService();
        $errors = $courtService->run(data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('court_register', compact('errors', 'data'));
        }

        header(header: 'Location: /');
    }
}
