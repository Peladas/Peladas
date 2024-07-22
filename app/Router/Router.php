<?php

namespace App\Router;

$router = new RouterBase();

$router->get("/users", "UserController", "index");
var_dump($router->routes['GET']); die;