<?php
namespace App\Controller;

use App\Helper\EntityManagerCreator;
use App\Model\Contato;
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
        $pessoas = $this->entityManager->getRepository(Pessoa::class)->findAll();
        require __DIR__ . '/../View/Pessoa/index.php';
    }

    public function create()
    {
        require __DIR__ . '/../View/Pessoa/create.php';
    }

    public function store()
{
    $nome = $_POST['nome'] ?? null;
    $cpf = $_POST['cpf'] ?? null;
    $contatos = $_POST['contatos'] ?? [];

    if ($nome && $cpf && count($contatos) > 0) {
        // Criar nova pessoa
        $pessoa = new Pessoa();
        $pessoa->setNome($nome);
        $pessoa->setCpf($cpf);

        foreach ($contatos as $contatoData) {
            $tipo = $contatoData['tipo'] ?? null;  // Obter o tipo do contato
            $descricao = $contatoData['descricao'] ?? null;  // Obter a descrição (telefone ou email)

            if ($tipo !== null && $descricao) {
                $contato = new Contato();
                $contato->setTipo($tipo);  // Define o tipo
                $contato->setDescricao($descricao);  // Define a descrição
                $contato->setPessoa($pessoa);  // Define a relação com a pessoa
                
                $this->entityManager->persist($contato);
                $pessoa->addContato($contato);
            }
        }

        $this->entityManager->persist($pessoa);
        $this->entityManager->flush();

        header('Location: /maga-backend/pessoas');
        exit;
    } else {
        echo "Por favor, preencha todos os campos e adicione pelo menos um contato!";
    }
}



    public function edit($id)
    {
        $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);
        if (!$pessoa) {
            echo "Pessoa não encontrada!";
            return;
        }
        require __DIR__ . '/../View/Pessoa/edit.php';
    }

    public function update()
    {
        $id = $_POST['id'] ?? null;
        $nome = $_POST['nome'] ?? null;
        $cpf = $_POST['cpf'] ?? null;
        $contatos = $_POST['contato'] ?? [];

        if ($id && $nome && $cpf) {
            $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);

            if ($pessoa) {
                $pessoa->setNome($nome);
                $pessoa->setCpf($cpf);
                foreach ($pessoa->getContatos() as $contato) {
                    $this->entityManager->remove($contato);
                }

                foreach ($contatos as $descricao) {
                    if ($descricao) {
                        $contato = new Contato();
                        $contato->setDescricao($descricao);
                        $contato->setTipo(true); // Ajustar conforme necessário
                        $pessoa->addContato($contato);
                        $this->entityManager->persist($contato);
                }
            }

            $this->entityManager->flush();

            header('Location: /maga-backend/pessoas');
            exit;
        } else {
            echo "Pessoa não encontrada!";
        }
    } else {
        echo "Por favor, preencha todos os campos!";
    }
}

    public function deletar($id)
    {
        // Busca a pessoa pelo ID
        $pessoa = $this->entityManager->getRepository(Pessoa::class)->find($id);

        if (!$pessoa) {
            echo json_encode(['status' => 'error', 'message' => 'Pessoa não encontrada!']);
            http_response_code(404);
            exit;
        }

        // Remove os contatos associados à pessoa
        foreach ($pessoa->getContatos() as $contato) {
            $this->entityManager->remove($contato);
        }

        // Remove a pessoa
        $this->entityManager->remove($pessoa);
        $this->entityManager->flush();

        echo json_encode(['status' => 'success', 'message' => 'Pessoa deletada com sucesso']);
        http_response_code(200);
        exit;
    }



}
