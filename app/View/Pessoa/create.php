<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Pessoa</title>
    <link rel="stylesheet" href="/maga-backend/public/css/form-style.css">
    <script src="/maga-backend/public/js/Pessoa/pessoaCreate.js" defer></script>
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
            <div class="contato" id="contato-0">
                
                <!-- Select para Tipo de Contato -->
                <label for="tipo-0">Tipo de Contato:</label>
                <select name="contatos[0][tipo]" id="tipo-0" required>
                    <option value="" disabled selected>Selecione o tipo</option>
                    <option value="0">Email</option>
                    <option value="1">Telefone</option>
                </select><br>

                <!-- Campo para o contato (email ou telefone) -->
                <label for="descricao-0">Contato:</label>
                <input type="text" name="contatos[0][descricao]" id="descricao-0" required><br>

                <!-- Botão de Remover Contato -->
                <button type="button" onclick="removeContato(0)">Remover</button>
            </div>
        </div>

        <!-- Botões de Adicionar e Salvar -->
        <button type="button" onclick="addContato()">Adicionar Contato</button><br><br>
        <button type="submit">Salvar</button>
    </form>

</body>
</html>
