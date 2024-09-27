<?php

namespace App\Controllers;

class LocadorController extends Controller {

    public function homeOwner() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_locador');
        }
    }
}
