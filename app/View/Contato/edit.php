<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contato</title>
    <link rel="stylesheet" href="/maga-backend/public/css/form-style.css">
</head>
<body>
    
    <form action="/maga-backend/contato/update" method="POST">
        <h1>Editar Contato</h1>
        <input type="hidden" name="id" value="<?php echo $contato->getId(); ?>">
        
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="0" <?php echo ($contato->getTipo() == 0) ? 'selected' : ''; ?>>Email</option>
            <option value="1" <?php echo ($contato->getTipo() == 1) ? 'selected' : ''; ?>>Telefone</option>
        </select><br>

        <label for="descricao">Descrição:</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo htmlspecialchars($contato->getDescricao()); ?>" required>

        <label for="pessoa_id">Pessoa:</label>
        <select name="pessoa_id" id="pessoa_id" required>
            <?php foreach ($pessoas as $pessoa): ?>
                <option value="<?php echo $pessoa->getId(); ?>" <?php echo ($pessoa->getId() === $contato->getPessoa()->getId()) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($pessoa->getNome()); ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
