<?php

namespace App\Controllers;

use App\Dao\QuadraDAO;
use App\Enums\QuadrasStatusEnum;
use App\Exceptions\MethodNotAllowedException;
use App\Exceptions\UnauthorizedException;
use App\Services\QuadraServices\ActivateQuadraService;
use App\Services\QuadraServices\CreateQuadraService;
use App\Services\QuadraServices\DeleteQuadraService;
use App\Services\QuadraServices\InactivateQuadraService;
use App\Services\QuadraServices\ShowQuadraService;
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
        $quadras = $quadraDAO->getAll(filters: ['locador_id' => $locador->getId(), 'status' => '!' . QuadrasStatusEnum::DELETED]);

        return $this->render(view: 'lista_quadras', data: compact('quadras'));
    }

    public function show(int $id) {
        $locador = $this->getLocador();
        $showQuadraService = new ShowQuadraService();
        $quadra = $showQuadraService->run($id, $locador->getId());

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
        $locador = $this->getLocador();

        if ($this->getMethod() === 'get') {
            $locador = $this->getLocador();
            $showQuadraService = new ShowQuadraService();
            $quadra = $showQuadraService->run($id, $locador->getId());
            return $this->render(view: 'edit_quadras', data: compact('quadra'));
        }

        $data = $this->getBody();
        $quadraService = new UpdateQuadraService();
        $errors = $quadraService->run($id, $locador->getId(), data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('quadra_register', compact('errors', 'data'));
        }

        header(header: 'Location: /minhas-quadras');
    }

    public function delete(int $id) {
        if ($this->getMethod() !== 'post') {
            throw new MethodNotAllowedException();
        }

        header('Content-type: application/json');
        $locador = $this->getLocador();
        $deleteQuadraService = new DeleteQuadraService();
        $deleteQuadraService->run($id, $locador->getId());

        // echo json_encode([
        //     'message' => 'Catch',
        // ]);

        header('Location: /minhas-quadras');
    }

    public function inactivate(int $id) {
        if ($this->getMethod() !== 'post') {
            throw new MethodNotAllowedException();
        }

        header('Content-type: application/json');
        $locador = $this->getLocador();
        $inactivateQuadraService = new InactivateQuadraService();
        $inactivateQuadraService->run($id, $locador->getId());
    }

    public function activate(int $id) {
        if ($this->getMethod() !== 'post') {
            throw new MethodNotAllowedException();
        }

        header('Content-type: application/json');
        $locador = $this->getLocador();
        $activateQuadraService = new ActivateQuadraService();
        $activateQuadraService->run($id, $locador->getId());
    }
}
