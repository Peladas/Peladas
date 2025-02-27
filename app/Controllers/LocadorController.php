<?php

namespace App\Controllers;

use App\Dao\HorarioLocadorDAO;
use App\Dao\QuadraDAO;
use App\Dao\EnderecoDAO;

class LocadorController extends Controller {

    public function homeLocador() {
        if ($this->getMethod() === 'get') {
            return $this->render(view: 'home_locador');
        }
    }

    public function profile () {
        if ($this->getMethod() === 'get') {
            $locador = $this->getLocador();
            $quadras = $this->getQuadras();
            $horarios = $this->getHorarios();
            $endereco = $this->getEndereco();
            $telefone = $this->getTelefone();
            return $this->render('perfil_locador', compact('locador', 'quadras', 'horarios', 'endereco', 'telefone'));
        }
    }

    public function location() {
        if ($this->getMethod() === 'get') {
            $endereco = $this->getEndereco();
            return $this->render('areas_desportivas', compact('endereco'));
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

    private function getEndereco() {
        $locador = $this->getLocador();
        $enderecoDAO = new EnderecoDAO();
        return $enderecoDAO->first(['locador_id' => $locador->getId()]); // Substitua $locadorId pelo ID do locador autenticado
    }

    private function getTelefone() {
        $user = $this->getLoggedUser();
        return $user->getTelefone();
    }

}
