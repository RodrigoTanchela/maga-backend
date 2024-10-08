<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pessoa</title>
    <link rel="stylesheet" href="/maga-backend/public/css/form-style.css">
    <script src="/maga-backend/public/js/Pessoa/pessoaEdit.js" defer></script>
</head>
<body>
    <form action="/maga-backend/pessoa/update" method="POST">
        <h1>Editar Pessoa</h1>
        <input type="hidden" name="id" value="<?php echo $pessoa->getId(); ?>">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?php echo htmlspecialchars($pessoa->getNome()); ?>" required>

        <label for="cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" value="<?php echo htmlspecialchars($pessoa->getCpf()); ?>" required>

        <h2>Contatos</h2>
        <div id="contatos-container">
            <?php foreach ($pessoa->getContatos() as $index => $contato): ?>
                <div class="contato" id="contato-<?= $index ?>">
                    <label>Tipo:</label>
                    <select name="tipo[]">
                        <option value="telefone" <?= $contato->getTipo() == 'telefone' ? 'selected' : '' ?>>Telefone</option>
                        <option value="email" <?= $contato->getTipo() == 'email' ? 'selected' : '' ?>>Email</option>
                    </select>
                    <label>Contato:</label>
                    <input type="text" name="contato[]" value="<?= htmlspecialchars($contato->getDescricao()) ?>" required />
                    <button type="button" onclick="removeContato(<?= $index ?>)">Remover</button>
                </div>
            <?php endforeach; ?>
        </div>

        <button type="button" onclick="addContato()">Adicionar Contato</button><br>
        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
