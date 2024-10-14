<?php

namespace App\Controllers;

use App\Dao\ReservaDAO;
use App\Exceptions\UnauthorizedException;
use App\Exceptions\UnauthenticatedException;
use App\Services\QuadraServices\CreateReservaService;
use App\Services\ReservaServices\UpdateReservaService;

class ReservaController extends Controller {

    public function __construct() {
        parent::__construct();

        if ($this->userType !== 'jogador'){
            throw new UnauthorizedException();
        }
    }

    public function index() {
        $jogador = $this->getJogador();
        $reservaDAO = new ReservaDAO();
        $reservas = $reservaDAO->getAll(filters: ['jogador_id' => $jogador->getId()]);

        return $this->render(view: "lista_reservas", data: compact('reservas'));
    }

    public function show(int $id) {
        $jogador = $this->getJogador();
        $reservaDAO = new ReservaDAO();
        $reserva = $reservaDAO->find($id);

        if ($reserva->getJogadorId() !== $jogador->getId()) {
            throw new UnauthorizedException('Você não pode visualizar as informações dessa reserva');
        }

        return $this->render('show_reserva', compact('reserva'));
    }

    public function create() {
        if ($this->getMethod() === 'get') {
            if($this->userType != "jogador") {
                echo "Acesso negado!";
                exit;
            }

            return $this->render(view: 'reserva_register');
        }

        $data = $this->getBody();

        $createReservaService = new CreateReservaService();
        $errors = $createReservaService->run(data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('reserva_register', compact('errors', 'data'));
        }

        header(header: 'Location: /minhas-reservas');
    }

    public function update($id) {
        if ($this->getMethod() === 'get') {
            $reserva = UpdateReservaService::getReserva($id);
            return $this->render(view: 'edit_reserva', data: compact('reserva'));
        }

        $data = $this->getBody();

        $reservaService = new UpdateReservaService();
        $errors = $reservaService->run($id, data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('reserva_register', compact('errors', 'data'));
        }

        header(header: 'Location: /minhas-reservas');
    }
}
