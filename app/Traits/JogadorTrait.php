<?php

namespace App\Traits;

use App\Dao\JogadorDAO;
use App\Exceptions\UnauthenticatedException;
use App\Exceptions\UnauthorizedException;

trait JogadorTrait {
    protected function checkJogador(): void {
        $usuario_id = $_SESSION['usuario_id'] ?? null;

        if (!$usuario_id) {
            throw new UnauthenticatedException();
        }

        $jogadorDAO = new JogadorDAO();
        $jogador = $jogadorDAO->first(['usuario_id'=> $usuario_id]);

        if (!$jogador) {
            throw new UnauthorizedException();
        }

        $_SESSION['jogador'] = $jogador;
    }

    protected function getJogadorId(): int {
        $jogador = $_SESSION['jogador'] ?? null;

        if (!$jogador) {
            throw new UnauthorizedException();
        }

        return $jogador->id;
    }
}
