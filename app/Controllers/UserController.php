<?php

namespace App\Controllers;

class UserController extends Controller {
    public function index() {
        $name = $this->getSearchParam("name");
        $email = $this->getSearchParam("email");

        $this->render("user_view", compact("name", "email"));
    }
}
