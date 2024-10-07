<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pessoa</title>
    <link rel="stylesheet" href="/maga-backend/public/css/form-style.css">
</head>
<body>

    <form action="/maga-backend/pessoa/store" method="POST">
        <h1>Cadastrar Pessoa</h1>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required><br>

        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" id="cpf" required><br>

        <h3>Contatos</h3>
        <div id="contatos-container">
            <div class="contato">
                <label for="telefone">Telefone:</label>
                <input type="text" name="contatos[0][telefone]" required><br>
            </div>
        </div>

        <button type="button" onclick="addContato()">Adicionar Contato</button><br><br>

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
