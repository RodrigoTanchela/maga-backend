function deleteContato(id) {
    if (confirm("Tem certeza que deseja excluir este contato?")) {
        fetch(`/maga-backend/contato/destroy/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                alert(data.message);
                window.location.reload(); // Atualiza a página após a exclusão
            } else {
                alert('Erro ao deletar o contato.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro na requisição.');
        });
    }
}