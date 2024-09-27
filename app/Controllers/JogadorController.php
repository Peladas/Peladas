<?php

namespace App\Controllers;

class JogadorController extends Controller {

    public function homePlayer() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_jogador');
        }
    }
}
