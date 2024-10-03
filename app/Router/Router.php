<?php

namespace App\Router;

use App\Controllers\QuadraController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\LocadorController;
use App\Controllers\JogadorController;
use App\Controllers\UserController;

$router = new RouterBase();

$router->get(url: "/", controller: HomeController::class, method: "index");

//Home Jogador
$router->get(url: '/home_jogador', controller: JogadorController::class, method: 'homeJogador');
$router->post(url: '/home_jogador', controller: JogadorController::class, method: 'homeJogador');

//Home Locador
$router->get(url: '/home_locador', controller: LocadorController::class, method: 'homeLocador');
$router->post(url: '/home_locador', controller: LocadorController::class, method: 'homeLocador');

//Cadastro
$router->get(url: '/cadastro', controller: LoginController::class, method: 'register');
$router->post(url: '/cadastro', controller: LoginController::class, method: 'register');

//Login
$router->get(url: '/login', controller: LoginController::class, method: 'login');
$router->post(url: '/login', controller: LoginController::class, method: 'login');
$router->get(url: '/logout', controller: LoginController::class, method: 'logout');

//Viualização Quadras
$router->get(url: '/quadras', controller: QuadraController::class, method: 'quadra');
$router->post(url: '/quadras', controller: QuadraController::class, method: 'quadra');
$router->get(url: '/cadastro-quadras', controller: QuadraController::class, method: 'quadra_register');
$router->post(url: '/cadastro-quadras', controller: QuadraController::class, method: 'quadra_register');

//Rotas Usuário
$router->get(url: "/jogador", controller: UserController::class , method: "index");
$router->get(url: "/jogador/:joagdorId", controller: UserController::class , method: "show");
$router->post(url: "/jogador", controller: UserController::class , method: "create");
$router->post(url: "/jogador/:jogadorId", controller: UserController::class , method: "update");

$router->matchRoute();
