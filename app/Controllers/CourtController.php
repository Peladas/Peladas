<?php

namespace App\Controllers;

use App\Models\Quadra;
use App\Services\LoginServices\LoginService;

class CourtController extends Controller {

    public function quadras() {

        if ($this->getMethod() === 'get') {
            return $this->render('quadras');
        }

        return $this->render('quadras');
    }
}
