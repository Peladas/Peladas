<?php

namespace App\Controllers;

use App\Dao\EnderecoDAO;
use App\Services\EnderecoService\UpdateEnderecoService;

class EnderecoController extends Controller {

    // public function create() {
    //     if ($this->getMethod() === 'get') {
    //         if($this->userType != "locador") {
    //             echo "Acesso negado!";
    //             exit;
    //         }

    //         $endereco = [];

    //         return $this->render('endereco', compact('endereco'));
    //     }

    //     $data = $this->getBody();

    //     $createEnderecoService = new CreateEnderecoService();
    //     $errors = $createEnderecoService->run(data: $data);

    //     if (count(value: $errors) > 0) {
    //         return $this->render('horario_locador', compact('errors', 'data'));
    //     }

    //     header(header: 'Location: /perfil-locador');
    // }

    public function update() {
        if($this->userType != "locador") {
            echo "Acesso negado!";
            exit;
        }

        $locador = $this->getLocador();
        $id = $locador->getId();

        if ($this->getMethod() === 'get') {
            $enderecoDAO = new EnderecoDAO();
            $endereco = $enderecoDAO->first(['locador_id' => $id]);
            return $this->render('endereco', compact('endereco'));
        }

        try {
            $data = $this->getBody();
            $enderecoService = new UpdateEnderecoService();
            $errors = $enderecoService->run($id, $data);

            if (count($errors) > 0) {
                return $this->render('endereco_edit', compact('errors', 'data'));
            }

            header(header: 'Location: /perfil-locador');
        } catch (\Throwable $th) {
            var_dump($th->getMessage());
            throw $th;
        }
    }
}


