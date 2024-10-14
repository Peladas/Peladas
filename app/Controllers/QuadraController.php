<?php

namespace App\Controllers;

use App\Dao\QuadraDAO;
use App\Exceptions\UnauthorizedException;
use App\Services\QuadraServices\CreateQuadraService;
use App\Services\QuadraServices\DeleteQuadraService;
use App\Services\QuadraServices\UpdateQuadraService;

class QuadraController extends Controller {

    public function __construct() {
        parent::__construct();

        if ($this->userType !== 'locador') {
            throw new UnauthorizedException();
        }
    }

    public function index() {
        $locador = $this->getLocador();
        $quadraDAO = new QuadraDAO();
        $quadras = $quadraDAO->getAll(filters: ['locador_id' => $locador->getId()]);

        return $this->render(view: 'lista_quadras', data: compact('quadras'));
    }

    public function show(int $id) {
        $locador = $this->getLocador();
        $quadraDAO = new QuadraDAO();
        $quadra = $quadraDAO->find($id);

        if ($quadra->getLocadorId() !== $locador->getId()) {
            throw new UnauthorizedException('Você não pode visualizar as informações dessa quadra');
        }

        return $this->render('show_quadra', compact('quadra'));
    }

    public function create() {
        if ($this->getMethod() === 'get') {
            if($this->userType != "locador") {
                echo "Acesso negado!";
                exit;
            }

            return $this->render(view: 'quadra_register');
        }

        $data = $this->getBody();

        $createQuadraService = new CreateQuadraService();
        $errors = $createQuadraService->run(data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('quadra_register', compact('errors', 'data'));
        }

        header(header: 'Location: /minhas-quadras');
    }

    public function update($id) {
        if ($this->getMethod() === 'get') {
            $quadra = UpdateQuadraService::getQuadra($id);
            return $this->render(view: 'edit_quadras', data: compact('quadra'));
        }

        $data = $this->getBody();

        $quadraService = new UpdateQuadraService();
        $errors = $quadraService->run($id, data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('quadra_register', compact('errors', 'data'));
        }

        header(header: 'Location: /minhas-quadras');
    }

    // public function delete($id) {
    //     if ($this->getMethod() === 'get') {
    //         $quadra = DeleteQuadraService::getQuadra($id);
    //         return $quadra;
    //     }

    //     $data = $this->getBody();

    //     $quadraService = new DeleteQuadraService();
    //     $quadra = $quadraService->run($id);
    //     return $quadra;

    //     header(header: 'Location: /minhas-quadras');
    // }
}
