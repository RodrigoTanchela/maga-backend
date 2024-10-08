<?php

use App\Controller\ContatoController;
use App\Controller\PessoaController;
use App\Http\Loader;
use App\Http\Router;

require_once __DIR__ . '/vendor/autoload.php';

// Instância do roteador e do loader de controllers
$router = new Router();
$loader = new Loader();


$router->addRoute("GET", "/maga-backend/pessoas", fn() => $loader->load("PessoaController", "index"));

$router->addRoute("GET", "/maga-backend/pessoa/create/", fn() => $loader->load("PessoaController", "create"));

$router->addRoute("GET", "/maga-backend/pessoa/edit/{id}", fn($id) => $loader->load("PessoaController", "edit", ['id' => $id]));

$router->addRoute("DELETE", "/maga-backend/pessoa/destroy/{id}", fn($id) => $loader->load("PessoaController", "deletar", ['id' => $id]));

$router->addRoute("GET", "/maga-backend/contatos", fn() => $loader->load("ContatoController", "index"));
$router->addRoute("GET", "/maga-backend/contato/create/", fn() => $loader->load("ContatoController", "create"));
$router->addRoute("GET", "/maga-backend/contato/edit/{id}", fn($id) => $loader->load("ContatoController", "edit", ['id' => $id]));

$router->addRoute("DELETE", "/maga-backend/contato/destroy/{id}", fn($id) => $loader->load("ContatoController", "deletar", ['id' => $id]));

$router->addRoute("POST", "/maga-backend/pessoa/store", fn() => $loader->load("PessoaController", "store"));
$router->addRoute("POST", "/maga-backend/pessoa/update", fn() => $loader->load("PessoaController", "update"));

$router->addRoute("POST", "/maga-backend/contato/store", fn() => $loader->load("ContatoController", "store"));
$router->addRoute("POST", "/maga-backend/contato/update", fn() => $loader->load("ContatoController", "update"));

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->dispatch($method, $uri);



