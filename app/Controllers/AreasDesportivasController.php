<?php

namespace App\Controllers;

class AreasDesportivasController extends Controller {
    public function index() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'areas_desportivas');
        }
    }

    public function show() {
        //Mostra todos os perfis de locadores presentes no sistema
    }
}
