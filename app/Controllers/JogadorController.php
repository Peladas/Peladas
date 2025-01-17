<?php

namespace App\Controllers;

class JogadorController extends Controller {

    public function homeJogador() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_jogador');
        }
    }

    public function profile () {
        if ($this->getMethod() === 'get') {
            $user = $this->getLoggedUser();
            $jogador = $this->getJogador();
            $telefone = $this->getTelefone();

            return $this->render('perfil_jogador', compact('user', 'jogador', 'telefone'));
        }
    }

    private function getTelefone() {
        $user = $this->getLoggedUser();
        return $user->getTelefone();
    }
}
