<?php
namespace App\Controller;

use App\Model\Pessoa;

class PessoaController{
    public function getPessoa(){
        $pessoa = new Pessoa();
        var_dump($pessoa);
    }
}
