<?php

namespace App\Controllers;

class PlayerController extends Controller {

    public function homePlayer() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_jogador');
        }
    }
}
