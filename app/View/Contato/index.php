<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <link rel="stylesheet" href="public/css/style.css">
</head>
<body>
    <h1>Lista de Contatos</h1>
    <input type="text" id="search" placeholder="Buscar por nome...">
    <a href=/maga-backend/contato/create/ >Adicionar</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descricao</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="contato-list">
            <?php foreach ($contatos as $contato): ?>
            <tr>
                <td><?= $contato->getId() ?></td>
                <td><?= $contato->getTipo() ?></td>
                <td><?= $contato->getDescricao() ?></td>
                <td>
                    <a href="/maga-backend/contato/edit/<?= $contato->getId() ?>">Editar</a> 
                    <form class="delete" action="/maga-backend/contato/destroy/<?= $contato->getId() ?>" method="post">
                        <button class="btn-excluir" >Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script>
    document.getElementById('search').addEventListener('input', function() {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#contato-list tr');
        
        rows.forEach(row => {
            let nome = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
            row.style.display = nome.includes(filter) ? '' : 'none';
        });
    });
    </script>
</body>
</html>
