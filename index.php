<?php

use App\Controller\PessoaController;

require_once __DIR__ . '/vendor/autoload.php';

$pessoacontroller = new PessoaController();
$pessoacontroller->index();
