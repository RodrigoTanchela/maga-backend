<?php
namespace App\Controller;

use App\Helper\EntityManagerCreator;
use App\Model\Pessoa;
use Doctrine\ORM\EntityManager;

class PessoaController{

    private EntityManager $entityManager;

    public function __construct() {
        $this->entityManager = EntityManagerCreator::createEntityManager();
    }

    public function index()
    {
        //var_dump($this->entityManager);
        // $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
        // require __DIR__ . '/../View/Pessoa/index.php';
    }

}
