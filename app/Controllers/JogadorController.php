<?php

namespace App\Controllers;

use App\Services\JogadorServices\UpdateJogadorProfileService;

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

    public function updateProfile() {
        $user = $this->getLoggedUser();
        $jogador = $this->getJogador();
        $id = $jogador->getId();

        if ($this->getMethod() === 'get') {
            return $this->render('perfil_jogador_edit', compact('user', 'jogador'));
        }

        $data = $this->getBody();
        $jogadorService = new UpdateJogadorProfileService();
        $errors = $jogadorService->run($user, $jogador, $data);

        if (count(value: $errors) > 0) {
            return $this->render('perfil_jogador_edit', compact('errors', 'data', 'user', 'jogador'));
        }

        header(header: 'Location: /perfil-jogador');
    }

    private function getTelefone() {
        $user = $this->getLoggedUser();
        return $user->getTelefone();
    }
}
