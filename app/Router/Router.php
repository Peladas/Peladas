<?php

namespace App\Router;

use App\Controllers\CourtController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\UserController;

$router = new RouterBase();

$router->get("/", HomeController::class, "index");

//Cadastro
$router->get('/cadastro', LoginController::class, 'register');
$router->post('/cadastro', LoginController::class, 'register');

//Login
$router->get('/login', LoginController::class, 'login');
$router->post('/login', LoginController::class, 'login');
$router->get('/logout', LoginController::class, 'logout');

//Viualização Quadras
$router->get('/quadras', CourtController::class, 'quadras');
$router->post('/quadras', CourtController::class, 'quadras');

//Rotas Usuário
$router->get(url: "/jogador", controller: UserController::class , method: "index");
$router->get("/jogador/:joagdorId", UserController::class , "show");
$router->post("/jogador", UserController::class , "create");
$router->post("/jogador/:jogadorId", UserController::class , "update");

$router->matchRoute();
