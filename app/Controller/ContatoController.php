<?php
namespace App\Controller;

use App\Helper\EntityManagerCreator;
use App\Model\Contato;
use Doctrine\ORM\EntityManager;

class ContatoController{

    private EntityManager $entityManager;

    public function __construct() {
        $this->entityManager = EntityManagerCreator::createEntityManager();
    }

    public function index()
    {
        //var_dump($this->entityManager);
        $contatos = $this->entityManager->getRepository(Contato::class)->findAll();
        require __DIR__ . '/../View/Contato/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../View/Contato/create.php';
    }

    public function store()
    {

    $tipo = $_POST['tipo'] ?? null;
    $descricao = $_POST['descricao'] ?? null;

    if ($tipo && $descricao) {
            $contato = new Contato();
            $contato->setTipo($tipo);
            $contato->setDescricao($descricao);
    }
        $this->entityManager->persist($contato);
        $this->entityManager->flush();
        header('Location: /maga-backend/contatos');
        exit;
    } 


    public function edit($id)
    {
        $contato = $this->entityManager->getRepository(Contato::class)->find($id);
        if (!$contato) {
            echo "Contato não encontrada!";
            return;
        }
        require __DIR__ . '/../View/Contato/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $tipo = $_POST['tipo'] ?? null;
        $descricao = $_POST['descricao'] ?? null;

        if ($id && $tipo && $descricao) {
            $contato = $this->entityManager->getRepository(Contato::class)->find($id);

            if ($contato) {
                $contato->setTipo($tipo);
                $contato->setDescricao($descricao);
            }

            $this->entityManager->flush();

            header('Location: /maga-backend/contatos');
            exit;
        } else {
            echo "Contato não encontrada!";
        }
    }

    public function deletar($id)
    {
        $contato = $this->entityManager->getRepository(Contato::class)->find($id);
        if (!$contato) {
            echo "Contato não encontrada!";
         return;
        }

        foreach ($contato->getContatos() as $contato) {
            $this->entityManager->remove($contato);
        }
        $this->entityManager->remove($contato);
        $this->entityManager->flush();

        header('Location: /maga-backend/contatos');
        exit;
    }

}
