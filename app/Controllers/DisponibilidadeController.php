<?php

namespace App\Controllers;

use App\Dao\HorarioLocadorDAO;
use App\Dao\QuadraDAO;
use App\Exceptions\UnauthorizedException;
use DateTime;
use stdClass;

class DisponibilidadeController extends Controller {

    public function __construct() {
        parent::__construct();

        if ($this->userType !== 'locador') {
            throw new UnauthorizedException();
        }
    }

    public function index() {
        $idQuadra = $this->getSearchParam('quadra_id');

    }

    public function create(string $quadraId) {
        $locador = $this->getLocador();
        $disponibilidade = $this->getDisponibilidade((int)$quadraId);

        if(!$locador) {
            throw new UnauthorizedException();
        }

        if ($this->getMethod() === 'get') {

            return $this->render('disponibilidade', compact("disponibilidade") );
        }


        $data = $this->getBody();
        var_dump($data);die;

    }

    private function getDisponibilidade(int $quadra_id) {
        $quadraDAO = new QuadraDAO;
        $quadra = $quadraDAO->find($quadra_id);
        $horarioDAO = new HorarioLocadorDAO;
        $horario = $horarioDAO->getAll(["locador_id" => $quadra->getLocadorId()]);
        $disponibilidades = [];

        foreach($horario as $dia) {
            $disponibilidadeDia = [];
            $horaInicio = $dia->getHoraInicio();
            $horaFim = $dia->getHoraFim();
            $inicio = new DateTime($horaInicio);
            $fim = new DateTime($horaFim);

            while(true) {
                $time = $inicio->format('H:i');
                $inicio->modify('+1 hour');

                if ($inicio <= $fim) {
                    $disponibilidadeDia[] = $time;
                } else {
                    break;
                }

            }

            $disponibilidadeObj = new stdClass;
            $disponibilidadeObj->dia = $dia->getDiaSemana();
            $disponibilidadeObj->disponibilidade = $disponibilidadeDia;
            $disponibilidades[] = $disponibilidadeObj;
        }

        return $disponibilidades;
    }
}
