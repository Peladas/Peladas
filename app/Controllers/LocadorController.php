<?php

namespace App\Controllers;

use App\Dao\HorarioLocadorDAO;
use App\Dao\QuadraDAO;

class LocadorController extends Controller {

    public function homeLocador() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_locador');
        }
    }

    public function profile () {
        if ($this->getMethod() === 'get') {
            $quadras = $this->getQuadras();
            $horarios = $this->getHorarios();
            return $this->render('perfil_locador', compact('quadras', 'horarios'));
        }
    }

    private function getQuadras() {
        $locador = $this->getLocador();
        $quadraDAO = new QuadraDAO();
        $quadras = $quadraDAO->getAll(['locador_id' => $locador->getId()]);
        $quadrasArray = array_map(function ($quadra) {
            return $quadra->toArray();
        }, $quadras);
        return $quadras;
    }

    private function getHorarios(): array {
        $locador = $this->getLocador();
        $horarioLocadorDAO = new HorarioLocadorDAO();
        $horarios = $horarioLocadorDAO->getAll(['locador_id' => $locador->getId()]);
        return $horarios;
    }
}
