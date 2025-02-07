<?php

namespace App\Controllers;

use App\Dao\EnderecoDAO;
use App\Dao\LocadorDAO;
use App\Services\EnderecoService\UpdateEnderecoService;

class EnderecoController extends Controller {

    public function update() {
        if($this->userType != "locador") {
            echo "Acesso negado!";
            exit;
        }

        $locador = $this->getLocador();
        $id = $locador->getId();

        $enderecoDAO = new EnderecoDAO();
        $endereco = $enderecoDAO->first(['locador_id' => $id]);

        if ($this->getMethod() === 'get') {
            return $this->render('endereco', compact('endereco'));
        }

        try {
            $data = $this->getBody();
            $enderecoService = new UpdateEnderecoService();
            $errors = $enderecoService->run($id, $data);

            if (count($errors) > 0) {
                return $this->render('endereco', compact('errors', 'data', 'endereco'));
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


