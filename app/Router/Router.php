<?php

namespace App\Router;

use App\Controllers\AreasDesportivasController;
use App\Controllers\DisponibilidadeController;
use App\Controllers\QuadraController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LocadorController;
use App\Controllers\JogadorController;
use App\Controllers\ReservaController;
use App\Controllers\UserController;

$router = new RouterBase();

$router->get(url: "/", controller: HomeController::class, method: "index");

//Cadastro
$router->get(url: '/cadastro', controller: LoginController::class, method: 'register');
$router->post(url: '/cadastro', controller: LoginController::class, method: 'register');

//Login
$router->get(url: '/login', controller: LoginController::class, method: 'login');
$router->post(url: '/login', controller: LoginController::class, method: 'login');
$router->get(url: '/logout', controller: LoginController::class, method: 'logout');

//Viualização Quadras
$router->get(url: '/areas_desportivas', controller: AreasDesportivasController::class, method: 'index');
//$router->post(url: '/areas_desportivas', controller: QuadraController::class, method: 'areas_desportivas');
$router->get(url: '/minhas-quadras', controller: QuadraController::class, method: 'index');
$router->get(url: '/minhas-quadras/:id', controller: QuadraController::class, method: 'show');
$router->get(url: '/cadastro-quadras', controller: QuadraController::class, method: 'create');
$router->post(url: '/cadastro-quadras', controller: QuadraController::class, method: 'create');
$router->get(url: '/editar-quadras/:id', controller: QuadraController::class, method: 'update');
$router->post(url: '/editar-quadras/:id', controller: QuadraController::class, method: 'update');
$router->post(url: '/remover-quadras/:id', controller: QuadraController::class, method: 'delete');

$router->get(url: '/minhas-quadras/:id/disponibilidade', controller: DisponibilidadeController::class, method: 'show');

//Viualização Reservas
$router->get(url: '/minhas-reservas', controller: ReservaController::class, method: 'index');
$router->get(url: '/minhas-reservas/:id', controller: ReservaController::class, method: 'show');
$router->get(url: '/cadastro-reserva', controller: ReservaController::class, method: 'create');
$router->post(url: '/cadastro-reserva', controller: ReservaController::class, method: 'create');
$router->get(url: '/editar-reserva/:id', controller: ReservaController::class, method: 'update');
$router->post(url: '/editar-reserva/:id', controller: ReservaController::class, method: 'update');
$router->get(url: '/remover-reserva/:id', controller: ReservaController::class, method: 'delete');
$router->post(url: '/remover-reserva/:id', controller: ReservaController::class, method: 'delete');


//Rotas Usuário
$router->get(url: "/jogador", controller: UserController::class , method: "index");
$router->get(url: "/jogador/:jogadorId", controller: UserController::class , method: "show");
$router->post(url: "/jogador", controller: UserController::class , method: "create");
$router->post(url: "/jogador/:jogadorId", controller: UserController::class , method: "update");

//Perfil Locador
$router->get(url: '/perfil-locador', controller: LocadorController::class, method: 'profile');
$router->post(url: '/perfil-locador', controller: LocadorController::class, method: 'profile');

//Perfil Jogador
$router->get(url: '/perfil-jogador', controller: JogadorController::class, method: 'perfil');
$router->post(url: '/perfil-jogador', controller: JogadorController::class, method: 'perfil');

$router->matchRoute();
