<?php

namespace App\Router;

use App\Controllers\UserController;

$router = new RouterBase();

$router->get("/users", UserController::class , "index");

$router->matchRoute();