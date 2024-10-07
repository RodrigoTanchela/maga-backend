<?php

use App\Controller\ContatoController;
use App\Controller\PessoaController;

require_once __DIR__ . '/vendor/autoload.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pessoacontroller = new PessoaController();
$contatocontroller = new ContatoController();

if($uri == '/maga-backend/pessoas'){
    $pessoacontroller->index();
}

if($uri == '/maga-backend/pessoa/create/'){
    $pessoacontroller->create();
}

if (preg_match('/^\/maga-backend\/pessoa\/edit\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    $pessoacontroller->edit($id);
}

if($uri == '/maga-backend/pessoa/update'){
    $pessoacontroller->update();
}

if (preg_match('/^\/maga-backend\/pessoa\/destroy\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    $pessoacontroller->deletar($id);
}

if ($uri == '/maga-backend/pessoa/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $pessoacontroller->store();
}

////////////////////////////////////////////////////////////////////////////////

if($uri == '/maga-backend/contatos'){
    $contatocontroller->index();
}

if($uri == '/maga-backend/contato/create/'){
    $contatocontroller->create();
}

if (preg_match('/^\/maga-backend\/contato\/edit\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    $contatocontroller->edit($id);
}

if($uri == '/maga-backend/contato/update'){
    $contatocontroller->update();
}

if (preg_match('/^\/maga-backend\/contato\/destroy\/(\d+)$/', $uri, $matches)) {
    $id = $matches[1];
    $contatocontroller->deletar($id);
}

if ($uri == '/maga-backend/contato/store' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $contatocontroller->store();
}



