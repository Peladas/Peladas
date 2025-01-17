<?php

namespace App\Controllers;

use App\Dao\LocadorDAO;
use App\Dao\QuadraDAO;

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
}

?>
