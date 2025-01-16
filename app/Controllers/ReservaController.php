<?php

namespace App\Controllers;

use App\Dao\ReservaDAO;

class ReservaController extends Controller {
    private ReservaDAO $reservaDAO;

    public function __construct() {
        parent::__construct();
        $this->reservaDAO = new ReservaDAO();
    }

    /**
     * Exibe todas as reservas do jogador logado.
     */
    public function listarReservasJogador() {
        $jogador = $this->getJogador();
        $reservas = $this->reservaDAO->getByJogadorId($jogador->getId());

        $this->render('reservas/listar', ['reservas' => $reservas]);
    }

    /**
     * Cria uma nova reserva.
     */
    public function criarReserva() {
        $body = $this->getBody();

        // Validação básica dos dados
        if (!isset($body['quadra_id'], $body['data_reserva'], $body['hora_inicio'], $body['hora_fim'])) {
            throw new \InvalidArgumentException('Dados inválidos para criar reserva.');
        }

        $jogador = $this->getJogador();

        $data = [
            'jogador_id' => $jogador->getId(),
            'quadra_id' => $body['quadra_id'],
            'tipo_reserva' => $body['tipo_reserva'],
            'horario_reservado' => $body['horario_reservado'],
            'quantidade_jogadores' => $body['quantidade_jogadores'],
            'status' => 'pendente',
        ];

        $reservaId = $this->reservaDAO->criarReserva($data);

        $this->render('reservas/listar', ['reservaId' => $reservaId]);
    }
}
