<?php

namespace App\Router;

use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\UserController;

$router = new RouterBase();

$router->get("/", HomeController::class, "index");

// Login
$router->get('/cadastro', LoginController::class, 'register');
$router->post('/cadastro', LoginController::class, 'register');

//Rotas Usuário
$router->get("/joador", UserController::class , "index");
$router->get("/jogador/:joagdorId", UserController::class , "show");
$router->post("/jogador", UserController::class , "create");
$router->post("/jogador/:jogadorId", UserController::class , "update");

$router->matchRoute();
