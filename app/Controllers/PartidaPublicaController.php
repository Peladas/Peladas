<?php

namespace App\Controllers;

use App\Dao\JogadorDAO;
use App\Dao\PartidaPublicaDAO;
use App\Dao\QuadraDAO;
use App\Dao\ReservaDAO;
use App\Enums\PartidaTypeEnum;
use App\Enums\ReservaStatusEnum;
use App\Models\PartidaPublica;

class PartidaPublicaController extends Controller {
    private ReservaDAO $reservaDAO;

    public function __construct() {
        parent::__construct();
        $this->reservaDAO = new ReservaDAO();
    }

    public function index() {
        $jogador = $this->getJogador();

        $reservasAux = $this->reservaDAO->getAll([
            'tipo_reserva' => PartidaTypeEnum::PUBLICA,
            'status' => ReservaStatusEnum::PENDING,
            'jogador_id' => '!' . $jogador->getId()
        ]);

        $reservas = [];
        $quadraDAO = new QuadraDAO();
        $jogadorDAO = new JogadorDAO();

        foreach ($reservasAux as $r) {
            $reservaDado['reserva'] = $r;
            $reservaDado['quadra'] = $quadraDAO->find($r->getQuadraId());
            $reservaDado['jogador'] = $jogadorDAO->find($r->getJogadorId());

            $reservas[] = $reservaDado;
        }

        return $this->render('lista_partidas_publicas', compact('reservas'));
    }

    public function show(int $id) {
        $jogadorLogadoId = $this->getJogador()->getId();
        $reservaDAO = new ReservaDAO();
        $jogadorDAO = new JogadorDAO();
        $quadraDAO = new QuadraDAO();

        $reserva = $reservaDAO->find($id);
        $jogadoresInscritos = $reserva->getJogadoresInscritos();

        $quadra = $quadraDAO->find($reserva->getQuadraId());
        $maxJogadores = $quadra->getQuantMaxJogadores() - 1;
        $vagasRestantes = $maxJogadores - count($jogadoresInscritos);

        $jogador = $jogadorDAO->find($reserva->getJogadorId());

        // Buscar jogadores inscritos nessa partida

        return $this->render('show_partida_publica', compact('reserva', 'quadra', 'jogador', 'jogadoresInscritos', 'vagasRestantes', 'jogadorLogadoId'));
    }

    public function inscrever(int $id) {
        $jogador = $this->getJogador();
        $reserva = $this->reservaDAO->find($id);

        $quadra = $reserva->getQuadra();

        // Verifica se há vagas restantes
        $maxJogadores = $quadra->getQuantMaxJogadores() - 1;
        $jogadoresInscritos = $reserva->getJogadoresInscritos();

        if (count($jogadoresInscritos) < $maxJogadores) {
            $partidaPublicaDAO = new PartidaPublicaDAO();
            $partidaPublica = new PartidaPublica;

            $partidaPublica->setJogadorId($jogador->getId());
            $partidaPublica->setReservaId($id);
            $partidaPublicaDAO->create($partidaPublica);

            header('Location: /partida-publica/' . $id . '/inscrever' );
            return;
        }

        // $errors['global'] = 'Máximo de jogadores atingidos para esta partida';

        // return $this->render('show_partida_publica', compact('reserva', 'quadra', 'jogador'));
    }
}
