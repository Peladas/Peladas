<?php

namespace App\Controllers;

use App\Dao\EnderecoDAO;
use App\Dao\HorarioLocadorDAO;
use App\Dao\LocadorDAO;
use App\Dao\QuadraDAO;
use App\Dao\UserDAO;

class AreasDesportivasController extends Controller {

    private $locadorDAO;

    public function __construct() {
        parent::__construct();
        $this->locadorDAO = new LocadorDAO();
    }
    public function index() {
        if ($this->getMethod() === 'get') {
            $locadores = $this->locadorDAO->getAll();

            $enderecoDAO = new EnderecoDAO();

            $data = [];

            foreach ($locadores as $locador) {
                $area = new \stdClass;
                $area->id = $locador->getId();
                $area->nome = $locador->getNomeFantasia();
                $endereco = $enderecoDAO->first(['locador_id'=>$locador->getId()]);
                $area->endereco = $endereco ? $endereco->getFullAddress() : 'Sem endereço cadastrado';
                $data[] = $area;
            }

            return $this->render('areas_desportivas', compact('data'));
        }
    }

    public function show(int $id) {
        $locador = $this->locadorDAO->find($id);

        $enderecoDAO = new EnderecoDAO();
        $endereco = $enderecoDAO->first(['locador_id'=>$id]);

        $quadrasDAO = new QuadraDAO;
        $quadras = $quadrasDAO->getAll(['locador_id'=>$id]);

        $telefone = $this->getTelefone($id);

        $horarios = $this->getHorarios($id);

        return $this->render("area_desportiva", compact('locador', 'endereco', 'telefone', 'horarios', 'quadras'));
    }

    private function getTelefone(int $id): ?string {
        // Supondo que a relação entre locador e usuário seja através de um campo user_id
        $locador = $this->locadorDAO->find($id);

        if ($locador && $locador->getUsuarioId()) {
            $userDAO = new UserDAO; // Certifique-se de que esta classe existe
            $user = $userDAO->find($locador->getUsuarioId());
            return $user ? $user->getTelefone() : null;
        }

        return null;
    }


    private function getHorarios(int $id): array {
        $horarioLocadorDAO = new HorarioLocadorDAO();
        $horarios = $horarioLocadorDAO->getAll(['locador_id' => $id]);
        return $horarios;
    }
}
