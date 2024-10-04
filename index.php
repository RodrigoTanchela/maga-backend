<?php

use App\Controller\PessoaController;

require_once __DIR__ . '/vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(__DIR__);

$pessoacontroller = new PessoaController();
$pessoacontroller->getPessoa();
