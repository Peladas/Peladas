<?php

namespace App\Controllers;

use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;
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
        //Lista as reservas do Jogador
        $jogador = $this->getJogador();

        $reservas = array();
        /*$reservaDado = array("reserva" => ,
                           "quadra" => ,
                                    "locador" => );
        */
        $quadraDAO = new QuadraDAO();
        $locadorDAO = new LocadorDAO();

        $reservasAux = $this->reservaDAO->getAll(['jogador_id' => $jogador->getId()]);
        foreach($reservasAux as $r) {
            $reservaDado['reserva'] = $r;
            $reservaDado['quadra'] = $quadraDAO->find($r->getQuadraId());
            $reservaDado['locador'] = $locadorDAO->find($reservaDado['quadra']->getLocadorId());
            array_push($reservas, $reservaDado);
        }

        return $this->render('lista_reservas', compact('reservas'));
    }

    public function indexLocador() {
        //Lista as reservas do Locador
        $locador = $this->getLocador();

        $sql = "SELECT r.* FROM reservas r
                WHERE r.quadra_id IN (SELECT sub.id FROM quadras sub WHERE sub.locador_id = " . $locador->getId() . ")";

        $reservasAux = $this->reservaDAO->getSQL($sql);

        $reservas = array();

        $quadraDAO = new QuadraDAO();
        $jogadorDAO = new JogadorDAO();

        foreach($reservasAux as $r) {
            $reservaDado['reserva'] = $r;
            $reservaDado['quadra'] = $quadraDAO->find($r->getQuadraId());
            $reservaDado['jogador'] = $jogadorDAO->find($r->getJogadorId());
            array_push($reservas, $reservaDado);
        }

        return $this->render('lista_reservas_locador', compact('reservas'));
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

            $locadorDAO = new LocadorDAO();
            $locador = $locadorDAO->find($quadra->getLocadorId());

            return $this->render('show_quadra_desportiva', compact('errors', 'data', 'quadra', 'locador'));
        }

        header("location: /lista-reservas");
    }

    public function show(int $id) {
        $reservaDAO = new ReservaDAO();
        $reserva = $reservaDAO->find($id);

        return $this->render('show_reserva', compact('reserva'));
    }
}
