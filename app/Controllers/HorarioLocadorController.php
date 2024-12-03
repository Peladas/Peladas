<?php

namespace App\Controllers;

use App\Services\HorarioLocadorServices\UpdateHorarioLocadorService;
use App\Services\HorarioLocadorServices\CreateHorarioLocadorService;

class HorarioLocadorController extends Controller{
    public function create() {
        if ($this->getMethod() === 'get') {
            if($this->userType != "locador") {
                echo "Acesso negado!";
                exit;
            }

            return $this->render(view: 'horario_locador');
        }

        $data = $this->getBody();

        // var_dump($data);

        $createHorarioLocadorService = new CreateHorarioLocadorService();
        $errors = $createHorarioLocadorService->run(data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('horario_locador', compact('errors', 'data'));
        }

        header(header: 'Location: /perfil-locador');
    }
    public function update($id) {
        $locador = $this->getLocador();

        if ($this->getMethod() === 'get') {
            $updateHorario = new UpdateHorarioLocadorService();
            $horario = $updateHorario->run($id, $locador->getId());
            return $this->render('horario_locador_edit', compact('horario'));
        }

        $data = $this->getBody();
        $horarioService = new UpdateHorarioLocadorService();
        $errors = $horarioService->run($id, $locador->getId(), $data);

        if (count($errors) > 0) {
            return $this->render('horario_locador_edit', compact('errors', 'data'));
        }

        header(header: 'Location: /perfil-locador');
    }
}
