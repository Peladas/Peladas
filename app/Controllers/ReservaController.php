<?php

namespace App\Controllers;

use App\Dao\QuadraDAO;
use App\Dao\ReservaDAO;
use App\Exceptions\MethodNotAllowedException;
use App\Services\ReservaServices\CreateReservaService;
use Exception;

class ReservaController extends Controller {
    private ReservaDAO $reservaDAO;

    public function __construct() {
        parent::__construct();
        $this->reservaDAO = new ReservaDAO();
    }

    public function index() {
        $jogador = $this->getJogador();

        $reservas = $this->reservaDAO->getAll(['jogador_id' => $jogador->getId()]);

        return $this->render('lista_reservas', compact('reservas'));
    }

    public function create() {
        if ($this->getMethod() != 'post') {
            throw new MethodNotAllowedException;
        }
        $data = $this->getBody();

        $jogador = $this->getJogador();
        $jogadorId = $jogador->getId();

        $reservaExistente = $this->reservaDAO->first([
            'quadra_id' => $data['quadra_id'],
            'data_reserva' => $data['data_reserva'],
            'horario_reservado' => $data['horario_reservado']
        ]);

        if ($reservaExistente) {
            throw new Exception('Já existe uma reserva para essa quadra no dia e horário selecionados');
        }

        $reservaService = new CreateReservaService();
        $errors = $reservaService->run($jogadorId, $data);


        if (count($errors) > 0) {
            $quadraDAO = new QuadraDAO();
            $quadra = $quadraDAO->find($data['quadra_id']);

            return $this->render('show_quadra_desportiva', compact('errors', 'data', 'quadra'));
        }

        header("location: /lista-reservas");
    }

    public function show(int $id) {
        $reservaDAO = new ReservaDAO();
        $reserva = $reservaDAO->find($id);

        return $this->render('show_reserva', compact('reserva'));
    }
}
