<?php

namespace App\Traits;

use App\Dao\LocadorDAO;
use App\Exceptions\UnauthenticatedException;
use App\Exceptions\UnauthorizedException;

trait LocadorTrait {
    protected function checkLocador(): void {
        $usuario_id = $_SESSION['usuario_id'] ?? null;

        if (!$usuario_id) {
            throw new UnauthenticatedException();
        }

        $locadorDAO = new LocadorDAO();
        $locador = $locadorDAO->first(['usuario_id'=> $usuario_id]);

        if (!$locador) {
            throw new UnauthorizedException();
        }

        $_SESSION['locador'] = $locador;
    }

    protected function getLocadorId(): int {
        $locador = $_SESSION['locador'] ?? null;

        if (!$locador) {
            throw new UnauthorizedException();
        }

        return $locador->id;
    }
}
