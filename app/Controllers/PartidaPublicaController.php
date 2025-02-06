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
    private PartidaPublicaDAO $partidaPublicaDAO;

    public function __construct() {
        parent::__construct();
        $this->reservaDAO = new ReservaDAO();
        $this->partidaPublicaDAO = new PartidaPublicaDAO();
    }

    public function index() {
        $jogador = $this->getJogador();

        $filtro = $_GET['filtro'] ?? '1'; // Pega o status do filtro, se houver

        $reservasAux = array();

        switch ($filtro) {
            case '3':
                //Disponíveis
                $reservas = $this->reservaDAO->getAll([
                    'tipo_reserva' => PartidaTypeEnum::PUBLICA,
                    'status' => ReservaStatusEnum::PENDING,
                    'jogador_id' => '!' . $jogador->getId()
                ]);
                $reservasAux = array_filter($reservas, function ($reserva) use ($jogador) {
                    $participantes = $this->partidaPublicaDAO->getAll(['reserva_id' =>$reserva->getId()]);
                    foreach ($participantes as $participant) {
                        if ($participant->getJogadorId() == $jogador->getId()) return false;
                    }
                    return true;
                });
                break;
            case '2':
                //Inscrito
                $reservasAux = $this->reservaDAO->getSQL("SELECT r.* from reservas r WHERE id IN (SELECT pp.reserva_id from partidas_publicas pp WHERE pp.jogador_id = " . $jogador->getId() . ")");
                // $reservasAux = $this->reservaDAO->getSQL(
                //     sql: "SELECT r.*
                //         FROM partidas_publicas pp
                //         JOIN reservas r ON (r.id = pp.reserva_id AND pp.jogador_id = " . $jogador->getId() . ")"
                // );
                break;
            default:
                //Minhas partidas (1 ou qualquer outro valor)
                $reservasAux = $this->reservaDAO->getAll([
                    'tipo_reserva' => PartidaTypeEnum::PUBLICA,
                    'jogador_id' => $jogador->getId()
                ]);
        }

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

        $estaInscritoNaPartida = $this->estaInscritoNaPartida($id, $jogadorLogadoId);

        $quadra = $quadraDAO->find($reserva->getQuadraId());
        $maxJogadores = $quadra->getQuantMaxJogadores() - 1;
        $vagasRestantes = $maxJogadores - count($jogadoresInscritos);

        $jogador = $jogadorDAO->find($reserva->getJogadorId());

        $errors = $this->errors;

        // Buscar jogadores inscritos nessa partida

        return $this->render('show_partida_publica', compact('reserva', 'quadra', 'jogador', 'jogadoresInscritos', 'vagasRestantes', 'jogadorLogadoId', 'errors', 'estaInscritoNaPartida'));
    }

    public function inscrever(int $id) {
        $jogador = $this->getJogador();
        $reserva = $this->reservaDAO->find($id);

        $estaInscritoNaPartida = $this->estaInscritoNaPartida($id, $jogador->getId());

        if ($estaInscritoNaPartida) {
            $_SESSION['errors']['global'] = 'Já encontra-se inscrito nesta partida';
            header('Location: /partida-publica/' . $id . '/inscrever' );
            return;
        }

        $quadra = $reserva->getQuadra();

        // Verifica se há vagas restantes
        $maxJogadores = $quadra->getQuantMaxJogadores() - 1;
        $jogadoresInscritos = $reserva->getJogadoresInscritos();

        if (count($jogadoresInscritos) < $maxJogadores) {
            $partidaPublica = new PartidaPublica;

            $partidaPublica->setJogadorId($jogador->getId());
            $partidaPublica->setReservaId($id);
            $this->partidaPublicaDAO->create($partidaPublica);

            header('Location: /partida-publica/' . $id . '/inscrever' );
            return;
        }

        // $errors['global'] = 'Máximo de jogadores atingidos para esta partida';

        // return $this->render('show_partida_publica', compact('reserva', 'quadra', 'jogador'));
    }

    private function estaInscritoNaPartida (int $reservaId, int $jogadorId): bool {
        return !empty($this->partidaPublicaDAO->getAll([
            'reserva_id' => $reservaId,
            'jogador_id' => $jogadorId,
        ]));
    }
}
