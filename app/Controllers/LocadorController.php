<?php

namespace App\Controllers;

class LocadorController extends Controller {

    public function homeLocador() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_locador');
        }
    }

    public function profile () {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'perfil_locador');
        }
    }
}
