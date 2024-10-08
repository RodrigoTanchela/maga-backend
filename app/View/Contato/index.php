<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Contatos</title>
    <link rel="stylesheet" href="public/css/style.css">
    <script src="/maga-backend/public/js/Contato/contato.js" defer></script>
</head>
<body>
    <h1>Lista de Contatos</h1>
    <a href="/maga-backend/contato/create/">Adicionar</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody id="contato-list">
            <?php foreach ($contatos as $contato): ?>
            <tr>
                <td><?= $contato->getId() ?></td>
                <td><?= $contato->getTipo() ? 'Telefone' : 'Email' ?></td> <!-- Modificação aqui -->
                <td><?= htmlspecialchars($contato->getDescricao()) ?></td>
                <td>
                    <a href="/maga-backend/contato/edit/<?= $contato->getId() ?>">Editar</a> 
                    <button class="btn-excluir" onclick="deleteContato(<?= $contato->getId() ?>)">Excluir</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
