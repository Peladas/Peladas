<?php

namespace App\Controllers;

class JogadorController extends Controller {

    public function homeJogador() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_jogador');
        }
    }

    public function perfil () {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'perfil_jogador');
        }
    }
}
