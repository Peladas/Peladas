<?php

namespace App\Controllers;

use App\Dao\HorarioLocadorDAO;
use App\Dao\LocadorDAO;
use App\Dao\QuadraDAO;
use App\Services\ReservaServices\CreateReservaService;

use DateTime;

class QuadrasDesportivasController extends Controller {
    private $locadorDAO;

    public function __construct() {
        parent::__construct();
        $this->locadorDAO = new LocadorDAO();
    }
    public function show(int $locadorId, int $id) {
        $quadraDAO = new QuadraDAO();
        $quadra = $quadraDAO->find($id);

        return $this->render('show_quadra_desportiva', compact('quadra'));
    }

    public function getDisponibilidade(int $quadraId) {
        $date = $this->getSearchParam('date');
        if (!$date) {
            throw new \Exception('Data não definida');
        }
        $weekday = (int) date('N', strtotime($date));

        $quadraDAO = new QuadraDAO;
        $quadra = $quadraDAO->find($quadraId);
        $horarioDAO = new HorarioLocadorDAO;
        $horario = $horarioDAO->first(["locador_id" => $quadra->getLocadorId(), 'dia_semana' => $weekday]);

        $disponibilidadeDia = [];
        $horaInicio = $horario->getHoraInicio();
        $horaFim = $horario->getHoraFim();
        $inicio = new DateTime($horaInicio);
        $fim = new DateTime($horaFim);

        while(true) {
            $time = $inicio->format('H:i');
            $inicio->modify('+1 hour');

            if ($inicio <= $fim) {
                $disponibilidadeDia[] = $time . ' - ' . $inicio->format('H:i');
            } else {
                break;
            }

        }

        header('Content-type: application/json');
        echo json_encode($disponibilidadeDia);
    }
}

