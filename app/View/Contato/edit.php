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
        <input type="text" id="tipo" name="tipo" value="<?php echo htmlspecialchars($contato->getTipo()); ?>" required>

        <label for="descricao">Descricao</label>
        <input type="text" id="descricao" name="descricao" value="<?php echo htmlspecialchars($contato->getDescricao()); ?>" required>

        <input type="submit" value="Salvar Alterações">
    </form>
</body>
</html>
