<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" href="public/css/style.css"> <!-- Verifique este caminho -->
    <script src="/maga-backend/public/js/Pessoa/pessoa.js" defer></script>
</head>
<body>
    <h1>Lista de Pessoas</h1>
    <input type="text" id="search" placeholder="Buscar por nome...">
    <a href="/maga-backend/pessoa/create/">Adicionar</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Contatos</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="pessoa-list">
            <?php foreach ($pessoas as $pessoa): ?>
            <tr>
                <td><?= $pessoa->getId() ?></td>
                <td><?= $pessoa->getNome() ?></td>
                <td><?= $pessoa->getCpf() ?></td>
                <td>
                    <?php foreach ($pessoa->getContatos() as $contato): ?>
                    <?= htmlspecialchars($contato->getDescricao()) ?><br>
                    <?php endforeach; ?>
                </td>
                <td>
                    <a href="/maga-backend/pessoa/edit/<?= $pessoa->getId() ?>">Editar</a> 
                    <button class="btn-excluir" onclick="deletePessoa(<?= $pessoa->getId() ?>)">Excluir</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
