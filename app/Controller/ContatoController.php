<?php
namespace App\Controller;

use App\Helper\EntityManagerCreator;
use App\Model\Contato;
use App\Model\Pessoa;
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
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
        require __DIR__ . '/../View/Contato/create.php';
    }

    public function store()
    {
    $pessoaId = $_POST['pessoa_id'] ?? null;
    $tipo = $_POST['tipo'] ?? null;
    $descricao = $_POST['descricao'] ?? null;

    if ($pessoaId && $tipo !== null && $descricao) {
        // Busca a pessoa no banco de dados
        $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($pessoaId);

        if ($pessoa) {
            $contato = new Contato();
            $contato->setTipo($tipo);
            $contato->setDescricao($descricao);
            $contato->setPessoa($pessoa); // Associa o contato à pessoa

            $this->entityManager->persist($contato);
            $this->entityManager->flush();

            header('Location: /maga-backend/contatos');
            exit;
        } else {
            echo "Pessoa não encontrada!";
        }
    } else {
        echo "Por favor, preencha todos os campos!";
    }
}

    public function edit($id)
    {
    $contato = $this->entityManager->getRepository(Contato::class)->find($id);
    if (!$contato) {
        echo "Contato não encontrado!";
        return;
    }

    // Busca todas as pessoas
    $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();

    // Certifique-se de que a propriedade pessoa está inicializada
    if (!$contato->getPessoa()) {
        $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($contato->getPessoaId()); // Supondo que você tenha um método para obter o ID da pessoa
        $contato->setPessoa($pessoa);
    }

    require __DIR__ . '/../View/Contato/edit.php';
}

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $tipo = $_POST['tipo'] ?? null;
        $descricao = $_POST['descricao'] ?? null;
        $pessoaId = $_POST['pessoa_id'] ?? null; // Capture o ID da pessoa

        if ($id && $tipo !== null && $descricao && $pessoaId) {
            $contato = $this->entityManager->getRepository(Contato::class)->find($id);

            if ($contato) {
                $contato->setTipo($tipo);
                $contato->setDescricao($descricao);
            
                // Buscando e associando a pessoa ao contato
                $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($pessoaId);
                if ($pessoa) {
                    $contato->setPessoa($pessoa);
                } else {
                    echo "Pessoa não encontrada!";
                    return;
                }

                $this->entityManager->flush();

                header('Location: /maga-backend/contatos');
                exit;
            } else {
                echo "Contato não encontrado!";
            }
        } else {
        echo "Por favor, preencha todos os campos!";
        }
    }


    public function deletar($id)
    {
        $contato = $this->entityManager->getRepository(Contato::class)->find($id);
        if (!$contato) {
            header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON
            echo json_encode(['status' => 'error', 'message' => 'Contato não encontrado!']);
            http_response_code(404);
            exit;
        }

        $this->entityManager->remove($contato);
        $this->entityManager->flush();

        header('Content-Type: application/json'); // Define o tipo de conteúdo como JSON
        echo json_encode(['status' => 'success', 'message' => 'Contato deletado com sucesso']);
        http_response_code(200);
        exit;
    }


}
