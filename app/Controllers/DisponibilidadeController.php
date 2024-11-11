<?php

namespace App\Controllers;

use App\Exceptions\UnauthorizedException;
use App\Services\DisponibilidadeServices\CreateDisponibilidadeService;
use App\Services\DisponibilidadeServices\ShowDisponibilidadeService;

class DisponibilidadeController extends Controller {

    public function __construct() {
        parent::__construct();

        if ($this->userType !== 'locador') {
            throw new UnauthorizedException();
        }
    }

    public function create(int $id) {
        $locador = $this->getLocador();
        if ($this->getMethod() === 'get') {
            if ()

            return $this->render(view: 'quadra_register');
        }

        $data = $this->getBody();
        var_dump($data);die;

        $createService = new CreateDisponibilidadeService();
        $disponibilidade = $createService->run($id, $locador->getId(), $data);
    }
}
