<?php

namespace App\Controllers;

use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;
use App\Dao\QuadraDAO;
use App\Dao\ReservaDAO;
use App\Enums\ReservaStatusEnum;
use App\Exceptions\MethodNotAllowedException;
use App\Services\ReservaServices\CancelReservaService;
use App\Services\ReservaServices\CreateReservaService;
use Exception;

class ReservaController extends Controller {
    private ReservaDAO $reservaDAO;

    public function __construct() {
        parent::__construct();
        $this->reservaDAO = new ReservaDAO();
    }

    public function index() {
        $this->atualizarStatusReservasConcluidas();
        $jogador = $this->getJogador();

        $statusFiltro = isset($_GET['status']) ? $_GET['status'] : null; // Pega o status do filtro, se houver
        $partidaFiltro = isset($_GET['tipo_reserva']) ? $_GET['tipo_reserva'] : null;
        $reservas = [];
        $quadraDAO = new QuadraDAO();
        $locadorDAO = new LocadorDAO();
        $dataAtual = date('Y-m-d'); // Obtém a data atual

        // Cria as condições de busca para a consulta
        $condicoes = [
            'jogador_id' => $jogador->getId(),
            'status' => $statusFiltro ?? '!' . ReservaStatusEnum::CANCELED
        ];
        // Se um status foi filtrado, adicione à condição
        if ($statusFiltro) {
            $condicoes['status'] = $statusFiltro;
        }
        if ($partidaFiltro) {
            $condicoes['tipo_reserva'] = $partidaFiltro;
        }

        $reservasAux = $this->reservaDAO->getAll($condicoes);
        foreach ($reservasAux as $r) {
            $reservaDado['reserva'] = $r;
            $reservaDado['quadra'] = $quadraDAO->find($r->getQuadraId());
            $reservaDado['locador'] = $locadorDAO->find($reservaDado['quadra']->getLocadorId());

            array_push($reservas, $reservaDado);
        }

        return $this->render('lista_reservas', compact('reservas'));
    }

    public function indexLocador() {
        $this->atualizarStatusReservasConcluidas();
        $locador = $this->getLocador();

        $statusFiltro = isset($_GET['status']) ? $_GET['status'] : null;
        $partidaFiltro = isset($_GET['tipo_reserva']) ? $_GET['tipo_reserva'] : null;
        $reservas = [];
        $quadraDAO = new QuadraDAO();
        $jogadorDAO = new JogadorDAO();
        $dataAtual = date('Y-m-d');

        // Construção da consulta SQL dinâmica com os filtros
        $sql = "SELECT r.* FROM reservas r
                WHERE r.quadra_id IN (SELECT sub.id FROM quadras sub WHERE sub.locador_id = " . $locador->getId() . ")";

        if ($statusFiltro) {
            $sql .= " AND r.status = '$statusFiltro'";
        } else {
            $sql .= " AND r.status != '" . ReservaStatusEnum::CANCELED . "'";
        }

        if ($partidaFiltro) {
            $sql .= " AND r.tipo_reserva = '$partidaFiltro'";
        }

        $reservasAux = $this->reservaDAO->getSQL($sql);

        foreach ($reservasAux as $r) {
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

        $usuario = null;

        if ($this->userType !== 'jogador') {
            $usuario = 'locador';
        } else {
            $usuario = 'jogador';
        }

        $quadraDAO = new QuadraDAO();
        $quadra = $quadraDAO->find($reserva->getQuadraId());

        return $this->render('show_reserva', compact('reserva', 'quadra', 'usuario'));
    }

    public function cancel(int $id) {
        if ($this->getMethod() !== 'post') {
            throw new MethodNotAllowedException();
        }

        header('Content-type: application/json');
        $jogador = $this->getJogador();
        $cancelReservaService = new CancelReservaService();
        $cancelReservaService->run($id);

        header('Location: /lista-reservas');
        return;
    }

    private function atualizarStatusReservasConcluidas() {
        $dataAtual = date('Y-m-d');

        // Obtém todas as reservas que ainda não estão concluídas
        $reservas = $this->reservaDAO->getAll([
            'status' => ReservaStatusEnum::PENDING // Ou outro status válido
        ]);

        foreach ($reservas as $reserva) {
            if ($reserva->getDataReserva() < $dataAtual) {
                $this->reservaDAO->update($reserva->getId(), [
                    'status' => ReservaStatusEnum::COMPLETED
                ]);
            }
        }
    }
}
