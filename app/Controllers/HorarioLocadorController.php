<?php

namespace App\Controllers;

use App\Dao\HorarioLocadorDAO;
use App\Dao\LocadorDAO;
use App\Services\HorarioLocadorServices\UpdateHorarioLocadorService;
use App\Services\HorarioLocadorServices\CreateHorarioLocadorService;

class HorarioLocadorController extends Controller{
    public function create() {
        if ($this->getMethod() === 'get') {
            if($this->userType != "locador") {
                echo "Acesso negado!";
                exit;
            }

            $horarios = [];

            return $this->render('horario_locador', compact('horarios'));
        }

        $data = $this->getBody();

        $createHorarioLocadorService = new CreateHorarioLocadorService();
        $errors = $createHorarioLocadorService->run(data: $data);

        if (count(value: $errors) > 0) {
            return $this->render('horario_locador', compact('errors', 'data'));
        }

        header(header: 'Location: /perfil-locador');
    }
    public function update() {
        if($this->userType != "locador") {
            echo "Acesso negado!";
            exit;
        }

        $locador = $this->getLocador();
        $id = $locador->getId();

        if ($this->getMethod() === 'get') {
            $horarioDAO = new HorarioLocadorDAO();
            $horarios = $horarioDAO->getAll(['locador_id' => $id]);
            return $this->render('horario_locador', compact('horarios'));
        }

        try {
            $data = $this->getBody();
            $horarioService = new UpdateHorarioLocadorService();
            $errors = $horarioService->run($id, $data);

            if (count($errors) > 0) {
                return $this->render('horario_locador_edit', compact('errors', 'data'));
            }

            $cadastroCompleto = $locador->checarCadastroCompleto();
            $locadorDAO = new LocadorDAO();
            $locadorDAO->update($locador->getId(), ['cadastro_completo' => (int) $cadastroCompleto]);

            header(header: 'Location: /perfil-locador');
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            throw $th;
        }
    }

}
