<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar contato</title>
    <link rel="stylesheet" href="/maga-backend/public/css/form-style.css">
</head>
<body>

    <form action="/maga-backend/contato/store" method="POST">
        <h1>Cadastrar Contato</h1>

        <label for="pessoa_id">Pessoa:</label>
        <select name="pessoa_id" id="pessoa_id" required>
            <option value="" disabled selected>Selecione uma pessoa</option>
            <?php foreach ($pessoas as $pessoa): ?>
                <option value="<?= $pessoa->getId() ?>"><?= $pessoa->getNome() ?></option>
            <?php endforeach; ?>
        </select><br>

        <!-- Tipo do contato -->
        <label for="tipo">Tipo:</label>
        <select name="tipo" id="tipo" required>
            <option value="0">Email</option>
            <option value="1">Telefone</option>
        </select><br>

        <!-- Descrição do contato -->
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" required><br>

        <button type="submit">Salvar</button>
    </form>

</body>
</html>
