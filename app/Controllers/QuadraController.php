<?php

namespace App\Controllers;

use App\Services\QuadraService;

class QuadraController extends Controller {

    public function areas_desportivas() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'areas_desportivas');
        }
    }

    public function quadra_register() {
        if ($this->getMethod() === 'get') {
            if($this->userType != "locador") {
                echo "Acesso negado!";
                exit;
            }

            return $this->render(view: 'quadra_register');
        }

        $data = $this->getBody();

        $quadraService = new QuadraService();
        $errors = $quadraService->run(data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('quadra_register', compact('errors', 'data'));
        }

        header(header: 'Location: /quadras');
    }

}
