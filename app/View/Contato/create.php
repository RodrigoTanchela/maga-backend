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
        <h1>Cadastrar Pessoa</h1>
        <label for="tipo">Tipo:</label>
        <input type="text" name="tipo" id="tipo" required><br>

        <label for="descricao">CPF:</label>
        <input type="text" name="descricao" id="descricao" required><br>

        <button type="submit">Salvar</button>
    </form>
</body>


<script>
    let contatoCount = 1;

    function addContato() {
        const container = document.getElementById('contatos-container');
        const newContato = document.createElement('div');
        newContato.classList.add('contato');

        newContato.innerHTML = `
            <label for="telefone">Telefone:</label>
            <input type="text" name="contatos[${contatoCount}][telefone]" required><br>
        `;

        container.appendChild(newContato);
        contatoCount++;
    }
</script>
