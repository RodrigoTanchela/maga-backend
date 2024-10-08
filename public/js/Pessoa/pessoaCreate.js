let contatoCount = 1;

// Função para adicionar um novo contato
function addContato() {
    const container = document.getElementById('contatos-container');
    const newContato = document.createElement('div');
    newContato.classList.add('contato');
    newContato.setAttribute('id', 'contato-' + contatoCount);

    newContato.innerHTML = `
        <label for="tipo-${contatoCount}">Tipo de Contato:</label>
        <select name="contatos[${contatoCount}][tipo]" id="tipo-${contatoCount}" required>
            <option value="" disabled selected>Selecione o tipo</option>
            <option value="0">Email</option>
            <option value="1">Telefone</option>
        </select><br>

        <label for="descricao-${contatoCount}">Contato:</label>
        <input type="text" name="contatos[${contatoCount}][descricao]" id="descricao-${contatoCount}" required><br>

        <button type="button" onclick="removeContato(${contatoCount})">Remover</button>
    `;

    container.appendChild(newContato);
    contatoCount++;
}

// Função para remover um contato pelo ID
function removeContato(index) {
    const contatoDiv = document.getElementById('contato-' + index);
    if (contatoDiv) {
        contatoDiv.remove();
    }
}