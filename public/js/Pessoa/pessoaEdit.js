let contatoCount = document.querySelectorAll('#contatos-container .contato').length; // Conta as divs existentes

function addContato() {
    const container = document.getElementById('contatos-container');
    const newContato = document.createElement('div');
    newContato.classList.add('contato');
    newContato.setAttribute('id', 'contato-' + contatoCount);

    newContato.innerHTML = `
        <label>Tipo:</label>
        <select name="tipo[]">
            <option value="telefone">Telefone</option>
            <option value="email">Email</option>
        </select>
        <label>Contato:</label>
        <input type="text" name="contato[]" value="" required />
        <button type="button" onclick="removeContato(${contatoCount})">Remover</button>
    `;

    container.appendChild(newContato);
    contatoCount++; // Incrementa o contador após adicionar um novo contato
}

function removeContato(index) {
    const contatoDiv = document.getElementById('contato-' + index);
    if (contatoDiv) {
        contatoDiv.remove();
    }
}
