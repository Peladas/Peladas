<?php

namespace App\Controllers;

use App\Dao\JogadorDAO;
use App\Dao\LocadorDAO;
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

        $filtro = $_GET['filtro'] ?? '1'; // Filtro de tipo de partida
        $statusFiltro = $_GET['status'] ?? null; // Filtro de status

        $reservasAux = [];

        $condicoes = [
            'tipo_reserva' => PartidaTypeEnum::PUBLICA
        ];

        if ($statusFiltro) {
            $condicoes['status'] = $statusFiltro;
        }

        switch ($filtro) {
            case '3':
                // Disponíveis (pendentes e que o jogador ainda não participa)
                $condicoes['status'] = ReservaStatusEnum::PENDING;
                $condicoes['jogador_id'] = '!' . $jogador->getId();
                $reservas = $this->reservaDAO->getAll($condicoes);
                $reservasAux = array_filter($reservas, function ($reserva) use ($jogador) {
                    $participantes = $this->partidaPublicaDAO->getAll(['reserva_id' => $reserva->getId()]);
                    foreach ($participantes as $participant) {
                        if ($participant->getJogadorId() == $jogador->getId()) return false;
                    }
                    return true;
                });
                break;
            case '2':
                // Inscrito
                $sql = "SELECT r.* FROM reservas r WHERE id IN (
                    SELECT pp.reserva_id FROM partidas_publicas pp WHERE pp.jogador_id = " . $jogador->getId() . ")";
                if ($statusFiltro) {
                    $sql .= " AND r.status = '$statusFiltro'";
                }
                $reservasAux = $this->reservaDAO->getSQL($sql);
                break;
            default:
                // Minhas partidas (1 ou qualquer outro valor)
                $condicoes['jogador_id'] = $jogador->getId();
                $reservasAux = $this->reservaDAO->getAll($condicoes);
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
        $locadorDAO = new LocadorDAO();


        $reserva = $reservaDAO->find($id);
        $jogadoresInscritos = $reserva->getJogadoresInscritos();

        $estaInscritoNaPartida = $this->estaInscritoNaPartida($id, $jogadorLogadoId);

        $quadra = $quadraDAO->find($reserva->getQuadraId());
        $locador = $locadorDAO->find($quadra->getLocadorId());
        $maxJogadores = $quadra->getQuantMaxJogadores() - 1;
        $vagasRestantes = $maxJogadores - count($jogadoresInscritos);

        $jogador = $jogadorDAO->find($reserva->getJogadorId());

        $errors = $this->errors;

        // Buscar jogadores inscritos nessa partida

        return $this->render('show_partida_publica', compact('reserva', 'quadra', 'jogador', 'locador', 'jogadoresInscritos', 'vagasRestantes', 'jogadorLogadoId', 'errors', 'estaInscritoNaPartida'));
    }

    public function inscrever(int $id) {
        $jogador = $this->getJogador();
        $reserva = $this->reservaDAO->find($id);

        if ($reserva->getJogadorId() == $jogador->getId() ) {
            $_SESSION['errors']['global'] = 'Você não pode se inscrever na sua própria partida.';
            header('Location: /partida-publica/' . $id . '/inscrever' );
            return;
        }

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

    public function cancelar(int $id) {
        $jogador = $this->getJogador();

        // Verifica se o jogador está inscrito na partida
        $inscricao = $this->partidaPublicaDAO->getAll([
            'reserva_id' => $id,
            'jogador_id' => $jogador->getId(),
        ]);

        if (!empty($inscricao)) {
            // Remove a inscrição do jogador
            $this->partidaPublicaDAO->delete($inscricao[0]->getId());

            // Redireciona de volta para a página da partida
            header('Location: /partida-publica/' . $id . '/inscrever');
            return;
        }

        // Se o jogador não estiver inscrito, redireciona com uma mensagem de erro
        $_SESSION['errors']['global'] = 'Você não está inscrito nesta partida.';
        header('Location: /partida-publica/' . $id . '/inscrever');
    }

    private function estaInscritoNaPartida (int $reservaId, int $jogadorId): bool {
        return !empty($this->partidaPublicaDAO->getAll([
            'reserva_id' => $reservaId,
            'jogador_id' => $jogadorId,
        ]));
    }
}
