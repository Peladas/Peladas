<?php

namespace App\Router;

use App\Controllers\AreasDesportivasController;
use App\Controllers\DisponibilidadeController;
use App\Controllers\EnderecoController;
use App\Controllers\QuadraController;
use App\Controllers\HomeController;
use App\Controllers\HorarioLocadorController;
use App\Controllers\LoginController;
use App\Controllers\LocadorController;
use App\Controllers\JogadorController;
use App\Controllers\PartidaPublicaController;
use App\Controllers\QuadrasDesportivasController;
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

//Rotas Jogador
$router->get(url: '/areas-desportivas', controller: AreasDesportivasController::class, method: 'index');
$router->get(url: '/areas-desportivas/:id', controller: AreasDesportivasController::class, method: 'show');

$router->get(url: '/areas-desportivas/:locadorId/quadra/:id', controller: QuadrasDesportivasController::class, method: 'show');
// $router->get(url: "/api/quadra/quadra", controller: HomeController::class, method: "index");
$router->get(url: '/api/quadra/:quadraId/disponibilidade', controller: QuadrasDesportivasController::class, method: 'getDisponibilidade');

//Viualização Reservas
$router->get(url: '/lista-reservas', controller: ReservaController::class, method: 'index');
$router->get(url: '/lista-reservas-locador', controller: ReservaController::class, method: 'indexLocador');
$router->get(url: '/lista-reservas/reserva/:id', controller: ReservaController::class, method: 'show');
$router->post(url: '/cadastro-reserva', controller: ReservaController::class, method: 'create');
$router->get(url: '/editar-reserva/:id', controller: ReservaController::class, method: 'update');
$router->post(url: '/editar-reserva/:id', controller: ReservaController::class, method: 'update');
$router->post(url: '/cancelar-reserva/:id', controller: ReservaController::class, method: 'cancel');

//Partidas Públicas
$router->get(url: '/partidas-publicas', controller: PartidaPublicaController::class, method: 'index');
$router->get(url: '/partida-publica/:id/inscrever', controller: PartidaPublicaController::class, method: 'show');
$router->post(url: '/partida-publica/:id/inscrever', controller: PartidaPublicaController::class, method: 'inscrever');
$router->post(url: '/partida-publica/:id/cancelar', controller: PartidaPublicaController::class, method: 'cancelar');


//Viualização Quadras
$router->get(url: '/minhas-quadras', controller: QuadraController::class, method: 'index');
$router->get(url: '/minhas-quadras/:id', controller: QuadraController::class, method: 'show');
$router->get(url: '/cadastro-quadras', controller: QuadraController::class, method: 'create');
$router->post(url: '/cadastro-quadras', controller: QuadraController::class, method: 'create');
$router->get(url: '/editar-quadras/:id', controller: QuadraController::class, method: 'update');
$router->post(url: '/editar-quadras/:id', controller: QuadraController::class, method: 'update');
$router->post(url: '/remover-quadras/:id', controller: QuadraController::class, method: 'delete');
$router->post(url: '/inativar-quadras/:id', controller: QuadraController::class, method: 'inactivate');
$router->post(url: '/ativar-quadras/:id', controller: QuadraController::class, method: 'activate');

$router->get(url: '/minhas-quadras/:quadraId/disponibilidade', controller: DisponibilidadeController::class, method: 'create');
$router->post(url: '/minhas-quadras/:quadraId/disponibilidade', controller: DisponibilidadeController::class, method: 'create');

//Rotas Usuário
$router->get(url: "/jogador", controller: UserController::class , method: "index");
$router->get(url: "/jogador/:jogadorId", controller: UserController::class , method: "show");
$router->post(url: "/jogador", controller: UserController::class , method: "create");
$router->post(url: "/jogador/:jogadorId", controller: UserController::class , method: "update");

//Perfil Locador
$router->get(url: '/perfil-locador', controller: LocadorController::class, method: 'profile');
$router->post(url: '/perfil-locador', controller: LocadorController::class, method: 'profile');

//Horario Locador
$router->get(url: '/perfil-locador/editar-horario', controller: HorarioLocadorController::class, method: 'update');
$router->post(url: '/perfil-locador/editar-horario', controller: HorarioLocadorController::class, method: 'update');

//Endereço Locador

$router->get(url: '/perfil-locador/editar-endereco', controller: EnderecoController::class, method: 'update');
$router->post(url: '/perfil-locador/editar-endereco', controller: EnderecoController::class, method: 'update');

//Perfil Jogador
$router->get(url: '/perfil-jogador', controller: JogadorController::class, method: 'profile');
$router->post(url: '/perfil-jogador', controller: JogadorController::class, method: 'profile');
$router->get(url: '/perfil-jogador/editar-perfil', controller: JogadorController::class, method: 'updateProfile');
$router->post(url: '/perfil-jogador/editar-perfil', controller: JogadorController::class, method: 'updateProfile');

$router->matchRoute();
