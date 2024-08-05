<?php

namespace App\Router;

use App\Controllers\HomeController;
use App\Controllers\UserController;

$router = new RouterBase();

$router->get("/", HomeController::class, "index");
$router->get("/users", UserController::class , "index");
$router->get("/users/:userId", UserController::class , "show");
$router->post("/users", UserController::class , "create");
$router->post("/users/:userId", UserController::class , "update");

$router->matchRoute();