<?php

namespace App\Controllers;

use App\Dao\DisponibilidadeDAO;
use App\Exceptions\MethodNotAllowedException;
use App\Exceptions\UnauthorizedException;
use App\Services\DisponibilidadeServices\ShowDisponibilidadeService;

class DisponibilidadeController extends Controller {

    public function __construct() {
        parent::__construct();

        if ($this->userType !== 'locador') {
            throw new UnauthorizedException();
        }
    }

    public function show(int $id) {
        $quadra = $this->getQuadra();
        $showDisponibilidadeService = new ShowDisponibilidadeService();
        $disponibilidade = $showDisponibilidadeService->run($id, $quadra->getId());

        return $this->render('disponibilidade', compact('disponibilidade'));
    }

}
