<?php

namespace App\Controllers;

class OwnerController extends Controller {

    public function homeOwner() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_locador');
        }
    }
}
